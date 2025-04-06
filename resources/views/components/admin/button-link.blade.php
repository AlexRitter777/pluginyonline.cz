@props([
    'href'=>'#',
    'clickCondition' => '',
    'clickAction' => ''
    ])

<a
   href="{{ $href }}"
   @if($clickCondition && $clickAction)
        {{ $clickCondition}}"{{$clickAction}}"
   @endif
   {{ $attributes->merge([
        'class' => 'px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150
                    bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700
                    focus:outline-none focus:shadow-outline-purple
                    dark:bg-gray-600 dark:hover:bg-gray-500 dark:active:bg-gray-600 dark:text-gray-200'
                    ])
   }}

>
   {{ $slot }}
</a>
