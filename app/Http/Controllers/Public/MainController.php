<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
    public function index(){


      $services = Cache::rememberForever('services', function () {
          return Service::where('is_published', 1)
              ->orderByRaw('position IS NULL')
              ->orderBy('position')
              ->limit(3)
              ->get();
      });

      $portfolios = Cache::rememberForever('portfolios', function () {
          return Portfolio::where('is_published', 1)
              ->orderByRaw('position IS NULL')
              ->orderBy('position')
              ->limit(4)
              ->get();
      });




        return view('public.home', ['services' => $services, 'portfolios' => $portfolios]);
    }
}
