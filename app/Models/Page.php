<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Page extends Model
{
    use HasFactory;
    use HasSlug;


    protected $fillable = ['title', 'description', 'route_name', 'position', 'content', 'is_published', 'visible_in_footer'];


    public function getSlugOptions() : SlugOptions
    {

        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
