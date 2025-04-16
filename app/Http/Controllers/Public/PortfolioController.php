<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(){
        return view('public.portfolio.index');
    }


    public function show(string $id) {

       $portfolio = Portfolio::find($id);

       if(!$portfolio){
           return redirect()->route('portfolio.index');
       }

       return view('public.portfolio.show', ['id' => $id]);

    }

}
