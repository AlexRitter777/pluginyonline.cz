<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\UniqueCurrentSlug;
use App\Services\SlugGenerator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SlugController extends Controller
{
    public function generateSlug(Request $request, SlugGenerator $slugGenerator)
    {

        $request->validate([
            'title' => 'required',
        ]);

        $title = request('title');

        $slug = $slugGenerator->generateSlug($title);

        return response()->json([
            'status' => 'success',
            'slug' => $slug
        ]);
    }


    public function checkIfSlugExistsOrNot(Request $request, SlugGenerator $slugGenerator): JsonResponse
    {
        $request->validate([
            'slug' => ['required', new UniqueCurrentSlug($slugGenerator)],
        ]);

        return response()->json([
            'status' => 'success',
            'message'=> 'Success! This slug is free, You can use it.'
        ]);

    }


}
