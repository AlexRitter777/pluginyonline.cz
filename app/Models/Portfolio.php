<?php

namespace App\Models;

use App\Services\ImageUploadService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Portfolio extends Model
{

    use HasFactory;

    protected $fillable = ['title', 'name', 'type', 'purpose', 'features', 'requirements', 'description', 'content', 'is_published', 'thumbnail', 'position'];

    public function images()
    {
        return $this->hasMany(Image::class)->orderBy('position');
    }

    public function makePositionsArray(Collection $collection) : array {

        return $collection->pluck('position', 'unique_id')->toArray();

    }

    public function makePathsArray(Collection $collection) : array {

        return $collection
            ->mapWithKeys(fn($item) => [$item->unique_id => asset($item->path)])
            ->toArray();

    }

    public function saveImages(array $positions, array $images) : void
    {
        foreach ($positions as $key => $position) {

            if(isset($images[$key]) && $images[$key] instanceof UploadedFile) {

                $image = $images[$key];

                $this->imageUpload($image, $position, $key);

            }
        }

    }

    public function updateImages(array $positions, array $images, array $oldImagesIds, Collection $existingImages) : void
    {
        foreach ($positions as $key => $position) {

            if (isset($images[$key]) && $images[$key] instanceof UploadedFile) {

                $image = $images[$key];

                $this->imageUpload($image, $position, $key);


            } elseif (in_array($key, $oldImagesIds) && isset($existingImages[$key])) {

                $existingImages[$key]->update(['position' => $position]);

            }
        }
    }

    public function deleteImages(Collection $existingImages, array $oldImagesIds) : void
    {
        foreach ($existingImages as $image) {
            if (!in_array($image->unique_id, $oldImagesIds)) {
                Storage::delete($image->path);
                $image->delete();
            }
        }

    }

    protected function imageUpload(UploadedFile $image, string $position, string $unique_id) : void
    {
        $uploadedImage = ImageUploadService::storeGalleryImage($image);

        $this->images()->create([
            'path' => $uploadedImage['path'],
            'filename' => $uploadedImage['name'],
            'position' => $position,
            'unique_id' => $unique_id
        ]);
    }


}
