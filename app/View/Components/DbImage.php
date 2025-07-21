<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Vite;
use Illuminate\View\Component;

class DbImage extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $url)
    {
        if(!$url) {
            $this->url = asset("img/default-image.jpg");
        }else{
            $this->url = asset($url);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.db-image');
    }
}
