<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Slug;
use App\Services\SeoBreadcrumbsGenerator;
use Illuminate\Support\Facades\Log;

class PortfolioController extends Controller
{
    public function index(SeoBreadcrumbsGenerator $seoBreadcrumbsGenerator){

        $perPage = config('site.pagination.portfolio');

        $portfolios = Portfolio::publishedAndOrderedProjects(['slugs'])
            ->paginate($perPage);

        $currentPage = request()->get('page');
        $canonical = $currentPage == 1 || !$currentPage
            ? route('portfolio.index')
            : url()->full();

        $breadCrumbs = $seoBreadcrumbsGenerator->generate();

//        defer(fn()=> )

        return view('public.portfolio.index', ['portfolios' => $portfolios, 'canonical' => $canonical, 'breadCrumbs' => $breadCrumbs]);
    }


    public function show(string $slug, SeoBreadcrumbsGenerator $seoBreadcrumbsGenerator) {

        if ($requiredSlug = Slug::where('slug', $slug)->where('is_current', true)->first()) {

            $portfolio = $requiredSlug->portfolio()->where('is_published', true)->with('images')->first();

            if(!$portfolio){
                return redirect()->route('portfolio.index');
            }

            $breadCrumbs = $seoBreadcrumbsGenerator->generate($portfolio);

            return view('public.portfolio.show', ['portfolio' => $portfolio, 'breadCrumbs' => $breadCrumbs]);

        } elseif ($requiredSlug = Slug::where('slug', $slug)->first()) {

            $portfolio = Portfolio::with('slugs')
                ->where('id', $requiredSlug->portfolio->id)
                ->where('is_published', true)
                ->first();

            if(!$portfolio){
                return redirect()->route('portfolio.index');
            }

            $currentSlug = $portfolio->slugs->firstWhere('is_current', true);

            if (!$currentSlug) {

                Log::error("Data integrity error: Portfolio ID {$portfolio->id} has no active slug.");
                return redirect()->route('portfolio.index');

            }

            return redirect()->route('portfolio.show', ['slug' => $currentSlug->slug], 301);

        } else {

            return redirect()->route('portfolio.index');

        }
    }

}
