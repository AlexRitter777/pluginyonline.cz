<?php

namespace App\Models;

use App\Services\ImageUploadService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Portfolio extends Model
{

    use HasFactory;

    protected $fillable = ['title', 'name', 'type', 'purpose', 'features', 'requirements', 'description', 'content', 'is_published', 'thumbnail', 'position'];

    public function images(): HasMany
    {
        return $this->hasMany(Image::class)->orderBy('position');
    }

    public function slugs(): HasMany
    {
        return $this->hasMany(Slug::class);
    }

    public function makePositionsArray(Collection $collection) : array {

        return $collection->pluck('position', 'unique_id')->toArray();

    }

    public function makePathsArray(Collection $collection) : array {

        return $collection
            ->mapWithKeys(fn($item) => [$item->unique_id => asset($item->path)])
            ->toArray();

    }

    public function saveImages(array $positions, array $images) : array
    {
        $savedImagePaths = [];

        foreach ($positions as $key => $position) {

            if(isset($images[$key]) && $images[$key] instanceof UploadedFile) {

                $image = $images[$key];

                $savedImagePaths[] = $this->imageUpload($image, $position, $key);

            }
        }

        return $savedImagePaths;

    }

    public function updateImages(array $positions, array $images, array $oldImagesIds, Collection $existingImages) : array
    {
        $updatedImagePaths = [];

        foreach ($positions as $key => $position) {

            if (isset($images[$key]) && $images[$key] instanceof UploadedFile) {

                $image = $images[$key];

                $updatedImagePaths[] = $this->imageUpload($image, $position, $key);


            } elseif (in_array($key, $oldImagesIds) && isset($existingImages[$key])) {

                $existingImages[$key]->update(['position' => $position]);

            }
        }

        return $updatedImagePaths;

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

    protected function imageUpload(UploadedFile $image, string $position, string $unique_id) : string
    {
        $uploadedImage = ImageUploadService::storeGalleryImage($image);

        try {
            $this->images()->create([
                'path' => $uploadedImage['path'],
                'filename' => $uploadedImage['name'],
                'position' => $position,
                'unique_id' => $unique_id
            ]);

        }catch (\Exception $e){
            Storage::delete($uploadedImage['path']);
            throw $e;
        }

        return $uploadedImage['path'];

    }


}
