@php
    $currentRouteName = \Illuminate\Support\Facades\Route::currentRouteName();
@endphp
<ul class="block lg:flex">
    <x-public.menu-item
        :href="route('home')"
    >
        Home
    </x-public.menu-item>

    <x-public.menu-item
        :href="route('about')"
        :class="$currentRouteName === 'about' ? 'active' : ''"
    >
        O nas
    </x-public.menu-item>

    <x-public.menu-item
        :href="route('services.index')"
        :class="$currentRouteName === 'services.index' ? 'active' : ''"
    >
        Služby
    </x-public.menu-item>

    <x-public.menu-item
        :href="route('portfolio.index')"
        :class="$currentRouteName === 'portfolio.index' ? 'active' : ''"
    >
        Naše práce
    </x-public.menu-item>

    <x-public.menu-item
        :href="route('prices')"
        :class="$currentRouteName === 'prices' ? 'active' : ''"
    >
        Ceny
    </x-public.menu-item>

    <x-public.menu-item
        :href="route('contact')"
        :class="$currentRouteName === 'contact' ? 'active' : ''"
    >
        Kontakt
    </x-public.menu-item>
</ul>

<style>
    .active{
        --tw-text-opacity: 1;
        color: rgb(74 108 247);
    }
</style>
