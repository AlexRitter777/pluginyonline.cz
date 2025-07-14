<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class SeoBreadcrumbsGenerator
{

    private string $uri;

    public function __construct(
    )
    {
        $this->uri = Route::current()->uri;

    }

    private array $labels = [
        'home' => 'Domů',
        'services.index' => 'Služby',
        'services.show' => 'Služby',
        'portfolio.index' => 'Projekty',
        'portfolio.show' => 'Projekty',
        'prices' => 'Ceník',
        'contact' => 'Kontakt',
        'about' => 'O nás',
    ];


    public function generate(Model $model = null): array
    {
        $breadCrumbs = [
            ['label' => $this->labels['home'], 'url' => route('home')]
        ];


        if($this->uri === '/'){
            return $breadCrumbs;
        }

        $partsOfUri = explode('/', $this->uri);

        foreach($partsOfUri as $partOfUri){
            if(Str::is('{*}', $partOfUri)){
                $breadCrumbs[] = [
                    'label' => $model->title,
                    'url' => request()->fullUrl()
                ];
            }else{
                $routeName = Route::currentRouteName();
                if(Str::afterLast($routeName, '.') === 'show'){
                    $routeName = preg_replace('/\.show$/', '.index', $routeName);
                }
                $breadCrumbs[] = [
                    'label' => $this->labels[$routeName] ?? $model->title,
                    'url' => route($routeName)
                ];
            }
        }
        return $breadCrumbs;
    }
}
