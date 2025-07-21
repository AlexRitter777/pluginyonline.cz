<?php

namespace App\Services;

use App\Models\Page;
use App\Models\Portfolio;
use App\Models\Service;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use function Termwind\parse;

class SitemapGeneratorService
{

    public function generate() : bool
    {

        $sitemap = Sitemap::create();

        //Static Pages
        $this->addStaticPages($sitemap, [
            '/',
            '/o-nas',
            '/ceny',
            '/kontakt'
        ]);

        //Portfolio
        $this->addPortfolio($sitemap);

        // Services
       $this->addServices($sitemap);

        // Dynamic Pages
        $this->addDynamicPages($sitemap);

        //Generate Sitemap file
        $sitemap->writeToFile(public_path('sitemap.xml'));

        if(file_exists(public_path('sitemap.xml'))){
            return true;
        }

        return false;

    }


    private function addStaticPages(Sitemap $sitemap, array $pages = []): void
    {
        foreach ($pages as $page) {
            $sitemap->add(Url::create($page)
                ->setLastModificationDate(Carbon::parse(config('site.pages_modified.' . $page)))
            );
        }

    }

    private function addPortfolio(Sitemap $sitemap): void
    {
        $perPage = config('site.pagination.portfolio');
        $portfolioBuilder =  Portfolio::publishedAndOrderedProjects();

        $portfolioCount= $portfolioBuilder->count();

        if($portfolioCount === 0){
            $latestUpdatedDate = config('site.pages_modified.projekty');
            $sitemap->add(
                Url::create('/projekty')->setLastModificationDate(Carbon::parse($latestUpdatedDate))
            );
            return;
        }

        $countOfPages = ceil($portfolioCount / $perPage);

        for ($page = 1; $page <= $countOfPages; $page++) {

            $projects = $portfolioBuilder->clone()
                ->skip(($page - 1) * $perPage)
                ->take($perPage)
                ->get();

            $latestUpdatedProject = $projects->max('updated_at');

            $url = $page === 1 ? '/projekty' : '/projekty?page=' . $page;

            $sitemap->add(
                Url::create($url)->setLastModificationDate($latestUpdatedProject)
            );

        }

        $allProjects = Portfolio::publishedAndOrderedProjects(['slugs'])->get();

        foreach ($allProjects as $project) {

            $slug = $project->slugs->firstWhere('is_current', true)?->slug;

            if(!$slug) continue;

            $sitemap->add(Url::create('/projekty/' . $slug)
                ->setLastModificationDate($project->updated_at));
        }

    }

    private function addServices(Sitemap $sitemap): void
    {
        $allServices = Service::publishedAndOrderedServices()->get();

        $latestUpdatedService = $allServices->max('updated_at') ?? Carbon::parse(config('site.pages_modified.sluzby'));

        $sitemap->add(
            Url::create('/sluzby')
                ->setLastModificationDate($latestUpdatedService)
        );


        foreach ($allServices as $service) {
            $sitemap->add(
                Url::create('/sluzby/' . $service->slug)
                    ->setLastModificationDate($service->updated_at)
            );
        }
    }

    private function addDynamicPages(Sitemap $sitemap): void
    {
        $allPages = Page::where('is_published', true)->get();

        foreach ($allPages as $page) {
            $sitemap->add(
                Url::create('/' . $page->slug)
                    ->setLastModificationDate($page->updated_at)
            );
        }
    }

}
