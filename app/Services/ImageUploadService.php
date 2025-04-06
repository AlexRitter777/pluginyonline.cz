<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{

    public static function uploadOnlyImage(UploadedFile $image)
    {
        $uploadedImage = [];

        $newImageName = self::generateUniqueFileName($image);

        $uploadedImage['name'] = $newImageName;

        $folder = date('Y-m-d');

        $uploadedImage['path'] = $image->storeAs("images/{$folder}", $newImageName);

        return $uploadedImage;

    }

    public static function uploadImage(Request $request, string $key, $image = null) {

        if($image) {
            Storage::delete($image);
        }

        if($request->hasFile($key)){

            $file = $request->file($key);
            $newFileName = self::generateUniqueFileName($file);
            $folder = date('Y-m-d');

            return $file->storeAs("images/{$folder}", $newFileName);
        }
        return null;
    }

    public static function generateUniqueFileName(UploadedFile $file)
    {
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $uniqueId = uniqid();

        return "{$originalName}-{$uniqueId}.{$extension}";

    }


}
