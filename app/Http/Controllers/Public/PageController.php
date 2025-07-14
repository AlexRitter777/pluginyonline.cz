<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Services\SeoBreadcrumbsGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function show(Request $request, SeoBreadcrumbsGenerator $seoBreadcrumbsGenerator) {

        $slug = $request->path();

        $page = Cache::rememberForever("pages_{$slug}", function () use ($slug) {
           return Page::where('slug', $slug)->firstOrFail();
        });

        $breadCrumbs = $seoBreadcrumbsGenerator->generate($page);

        return view('public.page', ['page' => $page, 'breadCrumbs' => $breadCrumbs]);

    }
}
