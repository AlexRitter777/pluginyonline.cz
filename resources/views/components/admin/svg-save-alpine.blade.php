@props(['href' => '#'])
<a
    {{$attributes->merge([
        'class' => "flex items-center justify-between text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray",
        '@click.prevent'=>''

    ])}}
    {{--    class="flex items-center justify-between text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"--}}
    href="{{ $href }}"
>
    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
        <path d="M17 3a2 2 0 00-2-2H5a2 2 0 00-2 2v14a1 1 0 001 1h12a1 1 0 001-1V3zm-4 0v4H7V3h6zm-3 12a2 2 0 110-4 2 2 0 010 4z"/>
    </svg>
</a>
