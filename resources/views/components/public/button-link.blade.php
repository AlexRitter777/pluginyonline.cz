@props(["href" => "javascript:void(0)" ])

<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'py-4 px-10 lg:px-8 xl:px-10 inline-flex items-center justify-center
                    text-center text-white text-base bg-primary hover:bg-opacity-90
                    font-normal rounded-lg'
        ])
    }}
>
    {{ $slot }}
</a>
