<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index() {

        $services = Service::where('is_published', 1)->orderBy('position')->get();

        return view('public.services.index', ['services' => $services]);
    }

    public function show(string $id) {
        return view('public.services.show', ['id' => $id]);
    }

}
