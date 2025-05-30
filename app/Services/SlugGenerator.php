<?php

namespace App\Services;

use App\Models\Slug;
use Illuminate\Support\Str;

class SlugGenerator
{
    protected Slug $slug;

    public function __construct(Slug $slug)
    {
        $this->slug = $slug;
    }

    public function generateSlug($title, $limit = 100): string
    {

        $limitedTitle = $title;

        if(Str::length($title) > $limit) {

            $truncated = Str::limit($title, $limit);
            $limitedTitle = Str::beforeLast(trim($truncated), ' ');

        }


        $slug = Str::slug($limitedTitle, '-');

        $baseSlug = $slug;

        $i = 1;

         while ($this->slug->where('slug', $slug)->exists()){

             $slug = $baseSlug . '-' . $i++;

         }

    return $slug;


    }

}
