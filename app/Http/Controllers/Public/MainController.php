<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index(){
        return view('public.home');
    }
}
