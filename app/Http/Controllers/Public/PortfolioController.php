<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(){
        return view('public.portfolio.index');
    }


    public function show(string $id) {

       return view('public.portfolio.show', ['id'=>$id]);

    }

}
