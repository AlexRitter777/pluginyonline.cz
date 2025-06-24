<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Portfolio;
use App\Models\Slug;
use App\Services\SlugGenerator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('images')->truncate();
        DB::table('portfolios')->truncate();
        DB::table('slugs')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $slugger = app(SlugGenerator::class); // ← получаем из контейнера

        Portfolio::factory()
            ->count(10)
            ->create()
            ->each(function ($portfolio) use ($slugger) {
                $imageCount = rand(6, 10);

                foreach (range(1, $imageCount) as $i) {
                    Image::factory()->create([
                        'portfolio_id' => $portfolio->id,
                        'position' => $i,
                    ]);
                }

                Slug::factory()->create([
                    'portfolio_id' => $portfolio->id,
                    'slug' => $slugger->generateSlug($portfolio->title),
                    'is_current' => true,
                ]);

            });
    }
}
