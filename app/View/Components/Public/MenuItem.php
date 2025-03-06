<?php

namespace App\View\Components\Public;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class MenuItem extends Component
{



    /**
     * Create a new component instance.
     */
    public function __construct(public string $href)
    {
        $this->href = Route::currentRouteName() === 'home' ? $href :  route('home') . $this->href;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.public.menu-item');
    }
}
