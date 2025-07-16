<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PingSitemapService
{
    private array $defaultTargets = [
        'https://www.google.com',
        'https://www.bing.com',
    ];

    public function ping(array $urls = []): void
    {
        if (env('APP_ENV') !== 'production') {
            return;
        }

        $sitemapUrl = urlencode(url('/sitemap.xml'));
        $targets = $urls ?: $this->defaultTargets;

        foreach ($targets as $baseUrl) {
            $targetUrl = $baseUrl . '/ping?sitemap=' . $sitemapUrl;

            try {
                $response = Http::get($targetUrl);

                if (!$response->successful()) {
                    Log::warning("Sitemap ping failed: {$targetUrl}, Status: " . $response->status());
                }
            } catch (\Throwable $e) {
                Log::error("Sitemap ping error: {$targetUrl}, Error: " . $e->getMessage());
            }
        }
    }
}
