<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Service extends Model
{

    use HasSlug;
    protected $fillable = ['title', 'description', 'content', 'category_id', 'is_published', 'thumbnail', 'position'];


    public function getSlugOptions() : SlugOptions
    {

        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }





}
