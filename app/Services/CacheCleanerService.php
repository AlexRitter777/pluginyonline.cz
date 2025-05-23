<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CacheCleanerService
{

    public static function cleanCache(array $keys): void
    {

        foreach ($keys as $key) {
            Cache::forget($key);
        }

    }

    public static function clearAllPages(string $pagesKey): void{

        $cached_pages = Cache::get($pagesKey);
        foreach ($cached_pages as $cached_page) {
            Cache::forget("{$pagesKey}_{$cached_page->slug}");
        }
        Cache::forget($pagesKey);

    }

}
