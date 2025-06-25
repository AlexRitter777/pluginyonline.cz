<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PortfolioController extends Controller
{
    public function index(){

        $portfolios = Portfolio::with('slugs')
            ->where('is_published', 1)
            ->orderByRaw('position IS NULL')
            ->orderBy('position')
            ->paginate(6);

        $currentPage = request()->get('page');
        $canonical = $currentPage == 1 || !$currentPage
            ? route('portfolio.index')
            : url()->full();

        return view('public.portfolio.index', ['portfolios' => $portfolios, 'canonical' => $canonical]);
    }


    public function show(string $slug) {

        if ($requiredSlug = Slug::where('slug', $slug)->where('is_current', true)->first()) {

            $portfolio = $requiredSlug->portfolio()->where('is_published', true)->with('images')->first();

            if(!$portfolio){
                return redirect()->route('portfolio.index');
            }

            return view('public.portfolio.show', ['portfolio' => $portfolio]);

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
