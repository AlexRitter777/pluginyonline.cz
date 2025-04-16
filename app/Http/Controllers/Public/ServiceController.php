<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index() {

        $services = Service::where('is_published', 1)
                        ->orderByRaw('position IS NULL')
                        ->orderBy('position')->get();

        return view('public.services.index', ['services' => $services]);
    }

    public function show(string $slug) {

        $service = Service::findBySlug($slug);

        return view('public.services.show', ['service' => $service]);
    }

}
