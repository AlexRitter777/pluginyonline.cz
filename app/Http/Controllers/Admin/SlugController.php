<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SlugGenerator;
use Illuminate\Http\Request;

class SlugController extends Controller
{
    public function generateSlug(Request $request, SlugGenerator $slugGenerator)
    {

        return $slugGenerator->generateSlug('My title');

//        return response()->json('Slug generated!');

    }
}
