<?php

namespace Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_saves_files_and_database_entries(): void
    {
        Storage::fake('local');
        $this->withoutExceptionHandling();


        $admin = User::factory()->create(['is_admin' => true]);

        $thumbnail = UploadedFile::fake()->image('thumbnail.jpg');
        $image1 = UploadedFile::fake()->image('image1.jpg');
        $image2 = UploadedFile::fake()->image('image2.jpg');
        $image3 = UploadedFile::fake()->image('image3.jpg');


        $response = $this->actingAs($admin)
            ->post('/rw-admin/portfolio', [
                'title' => 'Test title',
                'name' => 'Test name',
                'old_slug' => null,
                'slug' => 'test-slug',
                'type' => 'Test type',
                'purpose' => 'Test purpose',
                'features' => 'Test features',
                'requirements' => 'Test requirements',
                'description' => 'Test description',
                'content' => 'Test content',
                'is_published' => true,
                'old_thumbnail' => null,
                'thumbnail' => $thumbnail,
                'position' => '1',
                'images' => [
                    '1750615011389' => $image1,
                    '1750615016206' => $image2,
                    '1750615020348' => $image3
                ],
                'positions' => '{"1750615011389":1,"1750615016206":2,"1750615020348":3}'
            ]);

        $response->assertRedirect(route('admin.portfolio.index'));

        $files = Storage::allFiles('images/' . now()->format('Y-m-d'));
        $this->assertCount(4, $files);

        $this->assertDatabaseHas('portfolios', [
            'title' => 'Test title',
        ]);

        $this->assertDatabaseHas('slugs', [
            'slug' => 'test-slug',
            'is_current' => true,
        ]);

        $this->assertDatabaseHas('images', [
            'unique_id' => '1750615011389',
        ]);
        $this->assertDatabaseHas('images', [
            'unique_id' => '1750615016206',
        ]);
        $this->assertDatabaseHas('images', [
            'unique_id' => '1750615020348',
        ]);


    }

    /**
     * For rollback testing – uncomment exception throw inside transaction.
     */
//    public function test_store_rollback_on_exception_and_deletes_files(): void
//    {
//        Storage::fake('local');
//        $this->withoutExceptionHandling();
//
//        $admin = User::factory()->create(['is_admin' => true]);
//
//        $thumbnail = UploadedFile::fake()->image('thumbnail.jpg');
//        $image1 = UploadedFile::fake()->image('image1.jpg');
//        $image2 = UploadedFile::fake()->image('image2.jpg');
//        $image3 = UploadedFile::fake()->image('image3.jpg');
//
//
//        $response = $this->actingAs($admin)
//            ->post('/rw-admin/portfolio', [
//                'title' => 'Test title',
//                'name' => 'Test name',
//                'old_slug' => null,
//                'slug' => 'test-slug-1',
//                'type' => 'Test type',
//                'purpose' => 'Test purpose',
//                'features' => 'Test features',
//                'requirements' => 'Test requirements',
//                'description' => 'Test description',
//                'content' => 'Test content',
//                'is_published' => true,
//                'old_thumbnail' => null,
//                'thumbnail' => $thumbnail,
//                'position' => '1',
//                'images' => [
//                    '1750615011389' => $image1,
//                    '1750615016206' => $image2,
//                    '1750615020348' => $image3
//                ],
//                'positions' => '{"1750615011389":1,"1750615016206":2,"1750615020348":3}'
//            ]);
//
//        $response->assertSessionHas('error', 'Portfolio store failed.');
//        $files = Storage::allFiles('images/' . now()->format('Y-m-d'));
//        $this->assertCount(0, $files);
//
//        $this->assertDatabaseCount('portfolios', 0);
//        $this->assertDatabaseCount('images', 0);
//        $this->assertDatabaseCount('slugs', 0);
//
//
//    }
//
}
