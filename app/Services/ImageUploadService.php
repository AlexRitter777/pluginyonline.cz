<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{


    public static function uploadImage(Request $request, string $key, $image = null) {

        if($image) {
            Storage::delete($image);
        }

        if($request->hasFile($key)){

            $folder = date('Y-m-d');
            return $request->file($key)->store("images/{$folder}");

        }

        return null;

    }




}
