<li class="relative group">
    <a
        href="{{ $href }}"
        {{ $attributes->merge([
                        'class' => 'menu-scroll menu-scroll-active text-base text-black group-hover:text-primary py-2 lg:py-6 lg:inline-flex lg:px-0 flex mx-8 lg:mr-0 lg:ml-6 xl:ml-12'
                        ])
        }}
    >
        {{ $slot }}
    </a>
</li>
