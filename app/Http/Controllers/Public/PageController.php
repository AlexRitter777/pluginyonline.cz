<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function show(Request $request) {

        $slug = $request->path();

        $page = Cache::rememberForever("pages_{$slug}", function () use ($slug) {
           return Page::where('slug', $slug)->firstOrFail();
        });

        return view('public.page', ['page' => $page]);

    }
}
