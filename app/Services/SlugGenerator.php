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

        $limitedTitle = $this->createLimitedTitle($title, $limit);

        return $this->createUniqueSlug($limitedTitle);

    }



    protected function createLimitedTitle($title, $limit): string
    {
        $limitedTitle = $title;

        if (Str::length($title) > $limit) {

            $truncated = Str::limit($title, $limit);
            $limitedTitle = Str::beforeLast(trim($truncated), ' ');

        }

        return $limitedTitle;
    }

    protected function createUniqueSlug($title): string
    {
        $slug = Str::slug($title, '-');

        $baseSlug = $slug;

        $i = 1;

        while ($this->isSlugExists($slug)){

            $slug = $baseSlug . '-' . $i++;

        }
        return $slug;
    }

    public function isSlugExists(string $slug): bool
    {
        return $this->slug->where('slug', $slug)->where('is_current', true)->exists();
    }


}
