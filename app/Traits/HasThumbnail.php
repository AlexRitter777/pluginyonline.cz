<?php

namespace App\Traits;

use App\Services\ImageUploadService;
use Illuminate\Http\UploadedFile;

trait HasThumbnail
{
    public function updateThumbnail(?UploadedFile $newThumbnail, ?string $oldThumbnailPathSubmitted = null, ?string $oldThumbnailPath = null ): ?string
    {

        $oldThumbnail = null;

        //No thumbnail from form, but thumbnail exists in DB
        if(!$oldThumbnailPathSubmitted && $oldThumbnailPath) {
            $oldThumbnail = $oldThumbnailPath;
        }

        //if we retrieve old thumbnail from form it means that thumbnail was not changed during editing
        return $oldThumbnailPathSubmitted ?: ImageUploadService::storeImage($newThumbnail, $oldThumbnail);

    }


}
