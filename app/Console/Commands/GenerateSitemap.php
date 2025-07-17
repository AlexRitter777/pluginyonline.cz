<?php

namespace App\Console\Commands;

use App\Services\SitemapGeneratorService;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        app(SitemapGeneratorService::class)->generate();

        $this->info('The sitemap generation was successful!');


    }
}
