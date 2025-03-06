<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function index() {
        return view('public.services.index');
    }

    public function show(string $id) {
        return view('public.services.show', ['id' => $id]);
    }

}
