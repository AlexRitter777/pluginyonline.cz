<?php

namespace App\View\Components\Public;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Vite;
use Illuminate\View\Component;

class JsonLd extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        string $type = 'Organization',
        ?string $title = null,
        ?string $url = null,
        ?string $description = null,
        ?string $image = null,
        ?array $breadcrumbs = null,
    )
    {
        $this->type = $type;
        $this->title = $title;
        $this->url = $url;
        $this->description = $description;
        $this->image = $image;
        $this->breadcrumbs = $breadcrumbs;
    }

    public function generateData(): array
    {

        return match ($this->type){
            'Organization' => [
               '@context' => 'https://schema.org',
               '@type' => 'Organization',
               'name' => 'PluginyOnline.cz',
               'url' => config('app.url'),
               'logo' => asset('img/og-default.png'),
            ],
            'WebSite' => [
                '@context' => 'https://schema.org',
                '@type' => 'WebSite',
                'name' => 'PluginyOnline.cz',
                'url' => config('app.url'),
            ],
            'WebPage', 'AboutPage' => [
                '@context' => 'https://schema.org',
                '@type' => $this->type,
                'name' => $this->title,
                'description' => $this->description,
                'url' => $this->url,
            ],
            'ContactPage',  => [
                '@context' => 'https://schema.org',
                '@type' => $this->type,
                'name' => $this->title,
                'url' => $this->url,
            ],
            'Service', 'CreativeWork', 'CollectionPage' => [
                '@context' => 'https://schema.org',
                '@type' => $this->type,
                'name' => $this->title,
                'description' => $this->description,
                'url' => $this->url,
                'image' => $this->image,
            ],

            'BreadcrumbList' => [
                '@context' => 'https://schema.org',
                '@type' => 'BreadcrumbList',
                'itemListElement' =>
                    collect($this->breadcrumbs)->map(fn ($item, $i) => [
                    '@type' => 'ListItem',
                    'position' => $i + 1,
                    'name' => $item['label'],
                    'item' => $item['url'],
                ])->toArray(),
            ],
            default => [],
        };

    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.public.json-ld');
    }
}
