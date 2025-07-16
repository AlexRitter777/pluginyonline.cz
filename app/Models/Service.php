<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Service extends Model
{
    use HasFactory;

    use HasSlug;
    protected $fillable = ['title', 'description', 'content', 'is_published', 'thumbnail', 'position'];

    public static function publishedAndOrderedServices(array $with = []) : Builder
    {
        $query = self::query()
            ->where('is_published', 1)
            ->orderByRaw('position IS NULL')
            ->orderBy('position');
        if(!empty($with)){
            $query->with($with);
        }
        return $query;
    }


    public function getSlugOptions() : SlugOptions
    {

        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }





}
