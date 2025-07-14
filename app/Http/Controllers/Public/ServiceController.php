<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\SeoBreadcrumbsGenerator;

class ServiceController extends Controller
{
    public function index(SeoBreadcrumbsGenerator $seoBreadcrumbsGenerator) {

        $services = Service::where('is_published', 1)
                        ->orderByRaw('position IS NULL')
                        ->orderBy('position')->get();

        $breadCrumbs = $seoBreadcrumbsGenerator->generate();

        return view('public.services.index', ['services' => $services, 'breadCrumbs' => $breadCrumbs]);
    }

    public function show(string $slug, SeoBreadcrumbsGenerator $seoBreadcrumbsGenerator) {

        $service = Service::findBySlug($slug);

        if(!$service || !$service->is_published) {
            return redirect()->route('services.index');
        }

        $breadCrumbs = $seoBreadcrumbsGenerator->generate($service);

        return view('public.services.show', ['service' => $service, 'breadCrumbs' => $breadCrumbs]);
    }

}
