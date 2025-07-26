@push('head')
    <link rel="preload"
          href="{{ asset('img/hero/hero-image-01.webp') }}"
          as="image"
          type="image/webp"
          fetchpriority="high"
    >
@endpush
<section id="home" class="relative pt-[120px] lg:pt-[150px] pb-[110px] bg-white">
    <div class="container">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full lg:w-5/12 px-4">
                <div class="hero-content">
                    <h1 class="text-dark font-bold text-4xl sm:text-[42px] lg:text-[40px] xl:text-[42px] leading-snug mb-3">
                        Vývoj pluginů na míru <br />
                        pro CMS WordPress <br />
                    </h1>
                    <p class="text-base mb-4 text-body-color max-w-[480px]">
                        Máte skvělý nápad, ale hotové pluginy nenabízejí přesně to, co potřebujete? Zkoušeli jste různé dostupné možnosti – včetně placených pluginů – ale žádný z nich nesplňuje vaše požadavky na 100 %? Možná splňují jen část funkcionality, takže se musíte přizpůsobit hotovým řešením, což vás vzdaluje od vaší původní vize.
                    </p>
                    <p class="text-base mb-4 text-body-color max-w-[480px]">
                        🛠 Řešení? Plugin na míru!
                    </p>
                    <p class="text-base mb-8 text-body-color max-w-[480px]">
                        Navrhneme a vytvoříme WordPress plugin přesně podle vašich potřeb – bez zbytečných funkcí, ale se vším, co je pro vás důležité. Optimalizovaný kód, bezproblémová integrace a podpora nejnovějších verzí WordPressu a WooCommerce.
                    </p>
                    <ul class="flex flex-wrap items-center justify-between">
                        <li class="">
                            <x-public.button-link class="menu-scroll px-2 xsm:px-6 sm:px-10 lg:px-8 xl:px-10" href="#kontakt">Poptat plugin</x-public.button-link>
                        </li>
                        <li>
                            <x-public.button-link class="px-2 xsm:px-6 sm:px-10 lg:px-8 xl:px-10" href="{{ route('portfolio.index') }}">Naše práce</x-public.button-link>
                        </li>
                    </ul>
                    <div class="clients pt-16">
                        <p class="font-normal text-xs flex items-center text-body-color mb-2">
                            Main Technologies
                            <span class="w-8 h-[1px] bg-body-color inline-block ml-2"></span>
                        </p>
                        <div class="flex items-center">
                            <div class="w-full py-3 mr-4">
                                <picture>
                                    <source srcset="{{ asset('img/technologies/WordPress-logotype-standard-244x82.webp') }}" type="image/webp">
                                    <img src="{{ asset('img/technologies/WordPress-logotype-standard-244x82.png') }}"
                                         alt="Logo Wordpress"
                                         decoding="async"
                                         loading="lazy">
                                </picture>
                            </div>
                            <div class="w-full py-3 mr-4">
                                <picture>
                                    <source srcset="{{ asset('img/technologies/Woo_logo_color_366x187.webp') }}" type="image/webp">
                                    <img src="{{ asset('img/technologies/Woo_logo_color_366x187.png') }}"
                                         alt="Logo WooCommerce"
                                         decoding="async"
                                         loading="lazy">
                                </picture>
                            </div>
                            <div class="w-full py-3 mr-4">
                                <picture>
                                    <source srcset="{{ asset('img/technologies/new-php-logo.webp') }}" type="image/webp">
                                    <img src="{{ asset('img/technologies/new-php-logo.png') }}"
                                         alt="Logo PHP"
                                         class="w-2/3"
                                         decoding="async"
                                         loading="lazy">
                                </picture>
                            </div>
                            <div class="w-full py-3 mr-4">
                                <picture>
                                    <source srcset="{{ asset('img/technologies/jQuery-Logo-366x93.webp') }}" type="image/webp">
                                    <img src="{{ asset('img/technologies/jQuery-Logo-366x93.png') }}"
                                         alt="Logo JQuery"
                                         decoding="async"
                                         loading="lazy">
                                </picture>
                            </div>
                            <div class="w-full py-3 mr-4">
                                <picture>
                                    <source srcset="{{ asset('img/technologies/Alpine.js-180x180.webp') }}" type="image/webp">
                                    <img src="{{ asset('img/technologies/Alpine.js-180x180.png') }}"
                                         alt="Logo Alpine.js"
                                         width="60"
                                         decoding="async"
                                         loading="lazy">
                                </picture>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block lg:w-1/12 px-4"></div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="lg:text-right lg:ml-auto">
                    <div class="relative inline-block z-10 pt-11 lg:pt-0">
                        <picture>
                            <source srcset="{{ asset('img/hero/hero-image-01.webp') }}" type="image/webp">
                            <img src="{{ asset('img/hero/hero-image-01.png') }}"
                                 decoding="async"
                                 fetchpriority="high"
                                 alt="Vývojář pracující na počítači"
                            />
                        </picture>
                        <span class="absolute -left-8 -bottom-8 z-[-1]">
                  <svg width="93" height="93" viewBox="0 0 93 93" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="2.5" cy="2.5" r="2.5" fill="#3056D3" />
                    <circle cx="2.5" cy="24.5" r="2.5" fill="#3056D3" />
                    <circle cx="2.5" cy="46.5" r="2.5" fill="#3056D3" />
                    <circle cx="2.5" cy="68.5" r="2.5" fill="#3056D3" />
                    <circle cx="2.5" cy="90.5" r="2.5" fill="#3056D3" />
                    <circle cx="24.5" cy="2.5" r="2.5" fill="#3056D3" />
                    <circle cx="24.5" cy="24.5" r="2.5" fill="#3056D3" />
                    <circle cx="24.5" cy="46.5" r="2.5" fill="#3056D3" />
                    <circle cx="24.5" cy="68.5" r="2.5" fill="#3056D3" />
                    <circle cx="24.5" cy="90.5" r="2.5" fill="#3056D3" />
                    <circle cx="46.5" cy="2.5" r="2.5" fill="#3056D3" />
                    <circle cx="46.5" cy="24.5" r="2.5" fill="#3056D3" />
                    <circle cx="46.5" cy="46.5" r="2.5" fill="#3056D3" />
                    <circle cx="46.5" cy="68.5" r="2.5" fill="#3056D3" />
                    <circle cx="46.5" cy="90.5" r="2.5" fill="#3056D3" />
                    <circle cx="68.5" cy="2.5" r="2.5" fill="#3056D3" />
                    <circle cx="68.5" cy="24.5" r="2.5" fill="#3056D3" />
                    <circle cx="68.5" cy="46.5" r="2.5" fill="#3056D3" />
                    <circle cx="68.5" cy="68.5" r="2.5" fill="#3056D3" />
                    <circle cx="68.5" cy="90.5" r="2.5" fill="#3056D3" />
                    <circle cx="90.5" cy="2.5" r="2.5" fill="#3056D3" />
                    <circle cx="90.5" cy="24.5" r="2.5" fill="#3056D3" />
                    <circle cx="90.5" cy="46.5" r="2.5" fill="#3056D3" />
                    <circle cx="90.5" cy="68.5" r="2.5" fill="#3056D3" />
                    <circle cx="90.5" cy="90.5" r="2.5" fill="#3056D3" />
                  </svg>
                </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

