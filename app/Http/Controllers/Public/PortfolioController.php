<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(){

        $portfolios = Portfolio::where('is_published', 1)
            ->orderByRaw('position IS NULL')
            ->orderBy('position')
            ->paginate(6);

        return view('public.portfolio.index', ['portfolios' => $portfolios]);
    }


    public function show(string $id) {

       $portfolio = Portfolio::with('images')->find($id);

       if(!$portfolio || !$portfolio->is_published){
           return redirect()->route('portfolio.index');
       }

       return view('public.portfolio.show', ['portfolio' => $portfolio]);

    }

}
