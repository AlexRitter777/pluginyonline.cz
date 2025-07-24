<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class ImageUploadService
{

    public static function storeGalleryImage(UploadedFile $image)
    {
        $uploadedImage = [];

        $newImageName = self::generateUniqueFileName($image);

        $uploadedImage['name'] = $newImageName;

        $folder = date('Y-m-d');

        $uploadedImage['path'] = $image->storeAs("images/{$folder}", $newImageName);

        return $uploadedImage;

    }

    // rename later
    public static function storeImage(?UploadedFile $file, ?string $oldPath = null) :?string {

        if($oldPath) {
            Storage::delete($oldPath);
        }

        if (!$file) {
            return null;
        }

        $newFileName = self::generateUniqueFileName($file);
        $folder = date('Y-m-d');

        $path = $file->storeAs("images/{$folder}", $newFileName);

        $fullPath = storage_path('app/' . $path);

        ImageOptimizer::optimize($fullPath);

        return $path;

    }

    public static function generateUniqueFileName(UploadedFile $file): string
    {
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $uniqueId = uniqid();

        return "{$originalName}-{$uniqueId}.{$extension}";

    }


}
