
<x-public.layouts.base-layout title="Home Page">
    {{--<x-slot:title>Home page</x-slot:title>--}}

    <!-- ====== Hero Section Start -->
    <div id="home" class="relative pt-[120px] lg:pt-[150px] pb-[110px] bg-white">
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
                            <li>
                                <x-public.button-link href="/link">Poptat plugin</x-public.button-link>
                            </li>
                                <x-public.button-link href="/link">Naše práce</x-public.button-link>
                            <li>
                            </li>
                        </ul>
                        <div class="clients pt-16">
                            <p class="font-normal text-xs flex items-center text-body-color mb-2">
                                Main Technologies
                                <span class="w-8 h-[1px] bg-body-color inline-block ml-2"></span>
                            </p>
                            <div class="flex items-center">
                                <div class="w-full py-3 mr-4">
                                    <img src="{{ Vite::asset('resources/images/public/technologies/WordPress-logotype-standard.png') }}" alt="WordPress" />
                                </div>
                                <div class="w-full py-3 mr-4">
                                    <img src="{{ Vite::asset('resources/images/public/technologies/Woo_logo_color.png') }}" alt="WooCommerce" />
                                </div>
                                <div class="w-full py-3 mr-4">
                                    <img class="w-2/3" src="{{ Vite::asset('resources/images/public/technologies/new-php-logo.png') }}" alt="PHP" />
                                </div>
                                <div class="w-full py-3 mr-4">
                                    <img src="{{ Vite::asset('resources/images/public/technologies/jQuery-Logo.pn') }}g" alt="jQuery" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block lg:w-1/12 px-4"></div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="lg:text-right lg:ml-auto">
                        <div class="relative inline-block z-10 pt-11 lg:pt-0">
                            <img src="{{ Vite::asset('resources/images/public/hero/hero-image-01.png') }}" alt="hero" class="max-w-full lg:ml-auto" />
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
    </div>
    <!-- ====== Hero Section End -->

    <!-- ====== About Section Start -->
    <section id="about" class="pt-[145px] pb-[120px] relative z-10">
        <div class="container">
            <div class="flex flex-wrap mx-[-16px]">
                <div class="w-full lg:w-1/2 xl:w-7/12 px-4 mb-8 lg:mb-0">
                    <span class="font-bold text-primary text-lg md:text-xl mb-3"> O NAS </span>
                    <h2 class="max-w-[400px] font-bold text-black text-3xl sm:text-4xl md:text-[45px] leading-tight sm:leading-tight md:leading-tight mb-5">Profesionální vývoj pluginů pro WordPress</h2>
                    <p class="max-w-[570px] font-medium text-base text-body-color mb-2">
                        Dlouhodobě se věnujeme zakázkám na rozšíření, úpravy a přidání vlastní funkcionality webů postavených na WordPressu. Vždy, když je to možné, se snažíme vše vyřešit pomocí nezávislých a samostatných pluginů, které jsou zodpovědné pouze za konkrétní prvek funkcionality.
                    </p>
                    <p class="max-w-[570px] font-medium text-base text-body-color mb-2">
                        Obecné nebo vizuální úpravy provádíme vytvořením dceřiné šablony (child theme). Samozřejmostí je technická podpora po odevzdání a instalaci pluginu.
                    </p>
                    <p class="max-w-[570px] font-medium text-base text-body-color mb-2">
                        Z bezpečnostních důvodů nikdy neprovádíme úpravy v jádru WordPressu ani v běžící šabloně.
                    </p>
                    <p class="max-w-[570px] font-medium text-base text-body-color mb-2">
                        Pokud víme o existujícím funkčním pluginu, který může splnit požadavky klienta, vždy jej nejprve doporučíme vyzkoušet, než nabídneme vývoj individuálního řešení.
                    </p>
                    <p class="max-w-[570px] font-medium text-base text-body-color">
                        Nabízíme také správu a údržbu webových stránek na WordPress
                    </p>


                </div>
                <div class="w-full lg:w-1/2 xl:w-5/12 px-4">
                    <h3 class="font-semibold text-black text-2xl md:text-3xl mb-6">Jak to funguje</h3>

                    <ul class="font-medium text-base text-body-color mb-10 list-disc">
                        <li class="mb-3"><b>Technické zadání</b> – na základě informací od klienta společně tvoříme technické zadání pro vývoj pluginu.</li>
                        <li class="mb-3"><b>Emulace prostředí</b> – důležitým krokem je emulace webové stránky klienta na našem serveru, abychom mohli vyvíjet v prostředí co nejbližším tomu, kde bude plugin nasazen.</li>
                        <li class="mb-3"><b>Fáze vývoje</b> – samotný vývoj pluginu a případné úpravy funkcionality, pokud to bude nutné na základě zjištění během vývojového procesu.</li>
                        <li class="mb-3"><b>Testování a prezentace</b> – plugin testujeme a prezentujeme klientovi na našem serveru.</li>
                        <li class="mb-3"><b>Instalace a zprovoznění</b> – nasazení pluginu na server klienta a jeho uvedení do provozu.</li>
                        <li><b>Případné opravy a podpora</b> – pokud se v praxi objeví potřeba dalších úprav, zajistíme opravy a potřebnou technickou podporu.</li>
                    </ul>

                    <div class="process pt-12">
                        <div class="flex items-center">
                            <div class="w-full py-3 mr-4">
                                <img class="mx-auto" src="{{ Vite::asset('resources/images/public/process/req-icon.png') }}" alt="urs" />
                            </div>
                            <div class="w-full py-3 mr-4">
                                <img class="mx-auto" src="{{ Vite::asset('resources/images/public/process/dev-icon1.png') }}" alt="development" />
                            </div>
                            <div class="w-full py-3 mr-4">
                                <img class="mx-auto" src="{{ Vite::asset('resources/images/public/process/done-icon.png') }}" alt="work done" />
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="absolute right-0 top-1/2 -translate-y-1/2">
            <svg width="60" height="120" viewBox="0 0 60 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="60" cy="60" r="60" fill="url(#paint0_radial_18:24)" />
                <defs>
                    <radialGradient id="paint0_radial_18:24" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(60) rotate(90) scale(120)">
                        <stop stop-color="white" />
                        <stop offset="0.569" stop-color="#F0F4FD" />
                        <stop offset="0.993" stop-color="#D9E0F0" />
                    </radialGradient>
                </defs>
            </svg>
        </div>
    </section>
    <!-- ====== About Section End  -->

    <!-- ====== Services Section Start -->
    <section id="services" class="bg-black pt-20 lg:pt-[120px] pb-12 lg:pb-[90px]">
        <div class="container">
            <div class="flex flex-wrap items-end -mx-4 mb-10 lg:mb-[60px]">
                <div class="w-full lg:w-8/12 px-4">
                    <div class="max-w-[625px] mb-5">
                        <span class="font-semibold text-lg text-primary mb-2 block"> NAŠE SLUŽBY </span>
                        <h2 class="font-bold text-3xl sm:text-4xl md:text-[40px] text-white">Přidáváme vašim webům unikátní vzhled a funkcionalitu</h2>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-4">
                    <div class="flex lg:justify-end mb-5">
                        <a href="{{ route('services.index') }}" class="text-lg font-medium text-white underline hover:text-primary"> VŠECHNY SLUŽBY </a>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap justify-center -mx-4">
                @foreach($services as $service)
                    <x-public.services-item
                        :showRoute="route('services.show', $service->slug)"
                        :title="$service->title"
                        :imageUrl="$service->thumbnail"
                        :imageAlt="$service->slug . '-image'"
                    >
                        {{ $service->description }}
                    </x-public.services-item>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ====== Services Section End -->

    <!-- ====== Portfolio Section Start  -->
    <section id="portfolio" class="pt-[120px] pb-[70px] bg-[#f8f9ff]">
        <div class="container">
            <div class="flex flex-wrap mx-[-16px]">
                <div class="w-full px-4">
                    <div class="max-w-[600px] mx-auto text-center mb-[50px]">
                        <span class="font-semibold text-lg text-primary block mb-2"> Naše práce </span>
                        <h2 class="font-bold text-black text-3xl sm:text-4xl md:text-[45px] mb-5">Ukázky našich WordPress projektů</h2>
                        <p class="font-medium text-lg text-body-color">Zde najdete ukázky a podrobný popis některých našich prací – vývoj WordPress pluginů na míru, úpravy webových stránek a integrace WooCommerce.</p>
                    </div>
                </div>
            </div>
            <div class="portfolio-container flex justify-center -mx-4">
                @if($portfolios)
                <div class="w-full xl:w-10/12 px-4">
                    <div class="items-wrapper flex flex-wrap justify-center mx-[-16px]">
                        @foreach($portfolios as $portfolio)
                        <x-public.portfolio-item
                            :imageUrl="$portfolio->thumbnail"
                            :showRoute="route('portfolio.show', ['id' => $portfolio->id])"
                        >
                            <x-slot:title>{{ $portfolio->title }}</x-slot>
                            {{ $portfolio->description }}
                        </x-public.portfolio-item>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap mx-[-16px]">
                <div class="w-full px-4">
                    <div class="max-w-[600px] mx-auto text-center mb-[50px]">
                        <a href="{{ route('portfolio.index') }}" class="text-lg font-medium uppercase underline hover:text-primary"> Všechny projekty </a>
                    </div>
                </div>
            </div>
            @else
                <p class="font-semibold text-black text-xl inline-block mb-3">
                    My first project is on its way — coming soon!
                </p>
            @endif
        </div>
    </section>
    <!-- ====== Portfolio Section End  -->

    <!-- ====== Team Section Start -->
    <section id="team" class="pt-20 lg:pt-[120px]">
        <div class="container">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4">
                    <div class="text-center mx-auto mb-[60px] max-w-[510px]">
                        <span class="font-semibold text-lg text-primary mb-2 block uppercase"> Náš tým </span>
                        <h2 class="font-bold text-3xl sm:text-4xl md:text-[40px] text-dark mb-4">Náš tým pro vývoj WordPress pluginů</h2>
                        <p class="text-base text-body-color">Přinášíme individuální řešení, která rozšiřují funkčnost a zlepšují výkon vašich stránek.</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap justify-center -mx-4">
                <div class="w-full md:w-1/2 xl:w-1/4 px-4">
                    <div class="max-w-[370px] w-full mx-auto mb-10">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="{{ Vite::asset('resources/images/public/team/alex.jpg') }}" alt="image" class="w-full" />
                            <div class="absolute w-full bottom-5 left-0 text-center">
                                <div class="bg-white relative rounded-lg overflow-hidden mx-5 py-5 px-3">
                                    <h3 class="text-base font-semibold text-dark">Alex</h3>
                                    <p class="text-sm text-body-color">Web App Developer</p>
                                    <div>
                      <span class="absolute left-0 bottom-0">
                        <svg width="61" height="30" viewBox="0 0 61 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle cx="16" cy="45" r="45" fill="#13C296" fill-opacity="0.11" />
                        </svg>
                      </span>
                                        <span class="absolute top-0 right-0">
                        <svg width="20" height="25" viewBox="0 0 20 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle cx="0.706257" cy="24.3533" r="0.646687" transform="rotate(-90 0.706257 24.3533)" fill="#3056D3" />
                          <circle cx="6.39669" cy="24.3533" r="0.646687" transform="rotate(-90 6.39669 24.3533)" fill="#3056D3" />
                          <circle cx="12.0881" cy="24.3533" r="0.646687" transform="rotate(-90 12.0881 24.3533)" fill="#3056D3" />
                          <circle cx="17.7785" cy="24.3533" r="0.646687" transform="rotate(-90 17.7785 24.3533)" fill="#3056D3" />
                          <circle cx="0.706257" cy="18.6624" r="0.646687" transform="rotate(-90 0.706257 18.6624)" fill="#3056D3" />
                          <circle cx="6.39669" cy="18.6624" r="0.646687" transform="rotate(-90 6.39669 18.6624)" fill="#3056D3" />
                          <circle cx="12.0881" cy="18.6624" r="0.646687" transform="rotate(-90 12.0881 18.6624)" fill="#3056D3" />
                          <circle cx="17.7785" cy="18.6624" r="0.646687" transform="rotate(-90 17.7785 18.6624)" fill="#3056D3" />
                          <circle cx="0.706257" cy="12.9717" r="0.646687" transform="rotate(-90 0.706257 12.9717)" fill="#3056D3" />
                          <circle cx="6.39669" cy="12.9717" r="0.646687" transform="rotate(-90 6.39669 12.9717)" fill="#3056D3" />
                          <circle cx="12.0881" cy="12.9717" r="0.646687" transform="rotate(-90 12.0881 12.9717)" fill="#3056D3" />
                          <circle cx="17.7785" cy="12.9717" r="0.646687" transform="rotate(-90 17.7785 12.9717)" fill="#3056D3" />
                          <circle cx="0.706257" cy="7.28077" r="0.646687" transform="rotate(-90 0.706257 7.28077)" fill="#3056D3" />
                          <circle cx="6.39669" cy="7.28077" r="0.646687" transform="rotate(-90 6.39669 7.28077)" fill="#3056D3" />
                          <circle cx="12.0881" cy="7.28077" r="0.646687" transform="rotate(-90 12.0881 7.28077)" fill="#3056D3" />
                          <circle cx="17.7785" cy="7.28077" r="0.646687" transform="rotate(-90 17.7785 7.28077)" fill="#3056D3" />
                          <circle cx="0.706257" cy="1.58989" r="0.646687" transform="rotate(-90 0.706257 1.58989)" fill="#3056D3" />
                          <circle cx="6.39669" cy="1.58989" r="0.646687" transform="rotate(-90 6.39669 1.58989)" fill="#3056D3" />
                          <circle cx="12.0881" cy="1.58989" r="0.646687" transform="rotate(-90 12.0881 1.58989)" fill="#3056D3" />
                          <circle cx="17.7785" cy="1.58989" r="0.646687" transform="rotate(-90 17.7785 1.58989)" fill="#3056D3" />
                        </svg>
                      </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/4 px-4">
                    <div class="max-w-[370px] w-full mx-auto mb-10">
                        <div class="relative rounded-lg overflow-hidden">
                            <img src="{{ Vite::asset('resources/images/public/team/avatar.jpg') }}" alt="image" class="w-full" />
                            <div class="absolute w-full bottom-5 left-0 text-center">
                                <div class="bg-white relative rounded-lg overflow-hidden mx-5 py-5 px-3">
                                    <h3 class="text-base font-semibold text-dark">Pavel</h3>
                                    <p class="text-sm text-body-color">Frontend Developer</p>
                                    <div>
                      <span class="absolute left-0 bottom-0">
                        <svg width="61" height="30" viewBox="0 0 61 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle cx="16" cy="45" r="45" fill="#13C296" fill-opacity="0.11" />
                        </svg>
                      </span>
                                        <span class="absolute top-0 right-0">
                        <svg width="20" height="25" viewBox="0 0 20 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle cx="0.706257" cy="24.3533" r="0.646687" transform="rotate(-90 0.706257 24.3533)" fill="#3056D3" />
                          <circle cx="6.39669" cy="24.3533" r="0.646687" transform="rotate(-90 6.39669 24.3533)" fill="#3056D3" />
                          <circle cx="12.0881" cy="24.3533" r="0.646687" transform="rotate(-90 12.0881 24.3533)" fill="#3056D3" />
                          <circle cx="17.7785" cy="24.3533" r="0.646687" transform="rotate(-90 17.7785 24.3533)" fill="#3056D3" />
                          <circle cx="0.706257" cy="18.6624" r="0.646687" transform="rotate(-90 0.706257 18.6624)" fill="#3056D3" />
                          <circle cx="6.39669" cy="18.6624" r="0.646687" transform="rotate(-90 6.39669 18.6624)" fill="#3056D3" />
                          <circle cx="12.0881" cy="18.6624" r="0.646687" transform="rotate(-90 12.0881 18.6624)" fill="#3056D3" />
                          <circle cx="17.7785" cy="18.6624" r="0.646687" transform="rotate(-90 17.7785 18.6624)" fill="#3056D3" />
                          <circle cx="0.706257" cy="12.9717" r="0.646687" transform="rotate(-90 0.706257 12.9717)" fill="#3056D3" />
                          <circle cx="6.39669" cy="12.9717" r="0.646687" transform="rotate(-90 6.39669 12.9717)" fill="#3056D3" />
                          <circle cx="12.0881" cy="12.9717" r="0.646687" transform="rotate(-90 12.0881 12.9717)" fill="#3056D3" />
                          <circle cx="17.7785" cy="12.9717" r="0.646687" transform="rotate(-90 17.7785 12.9717)" fill="#3056D3" />
                          <circle cx="0.706257" cy="7.28077" r="0.646687" transform="rotate(-90 0.706257 7.28077)" fill="#3056D3" />
                          <circle cx="6.39669" cy="7.28077" r="0.646687" transform="rotate(-90 6.39669 7.28077)" fill="#3056D3" />
                          <circle cx="12.0881" cy="7.28077" r="0.646687" transform="rotate(-90 12.0881 7.28077)" fill="#3056D3" />
                          <circle cx="17.7785" cy="7.28077" r="0.646687" transform="rotate(-90 17.7785 7.28077)" fill="#3056D3" />
                          <circle cx="0.706257" cy="1.58989" r="0.646687" transform="rotate(-90 0.706257 1.58989)" fill="#3056D3" />
                          <circle cx="6.39669" cy="1.58989" r="0.646687" transform="rotate(-90 6.39669 1.58989)" fill="#3056D3" />
                          <circle cx="12.0881" cy="1.58989" r="0.646687" transform="rotate(-90 12.0881 1.58989)" fill="#3056D3" />
                          <circle cx="17.7785" cy="1.58989" r="0.646687" transform="rotate(-90 17.7785 1.58989)" fill="#3056D3" />
                        </svg>
                      </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ====== Team Section End -->

    <!-- ====== Pricing Section Start -->
    <section id="pricing" class="bg-white pt-20 lg:pt-[120px] relative z-20 overflow-hidden">
        <div class="container">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4">
                    <div class="text-center mx-auto mb-[60px] lg:mb-20 max-w-[510px]">
                        <span class="font-semibold text-lg text-primary mb-2 block"> CENY </span>
                        <h2 class="font-bold text-3xl sm:text-4xl md:text-[40px] text-dark mb-4">Ceny za vývoj pluginů pro WordPress</h2>
                        <p class="text-base text-body-color">Představujeme orientační ceny za vývoj vzorových pluginů různé velikosti. Přesnou cenu vám můžeme stanovit až po prostudování technického zadání.</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap justify-center -mx-4">
                <div class="w-full md:w-1/2 lg:w-1/3 px-4">
                    <div class="bg-white rounded-xl relative z-10 overflow-hidden border border-primary border-opacity-20 shadow-pricing py-10 px-8 sm:p-12 lg:py-10 lg:px-6 xl:px-10 2xl:p-12 mb-10">
                        <span class="text-primary font-semibold text-lg block mb-8"> Malý plugin </span>
                        <h2 class="font-bold text-dark mb-5 text-[30px]">
                            3.000 - 6.000 Kč
                        </h2>
                        <p class="text-base text-body-color pb-8 mb-8 border-b border-[#F2F2F2] min-h-[130px]">Jednoduchý plugin s minimálním zásahem do funkcionality.</p>
                        <p class="text-base text-body-color mb-2 font-bold">Přiklad:</p>
                        <p class="text-base text-body-color pb-4 mb-2 border-b border-[#F2F2F2] min-h-[90px]">Plugin pro WooCommerce, který zajišťuje, že některé zboží nelze prodat fyzické osobě, ale pouze firmě.</p>
                        <div class="mb-7 min-h-[460px]">

                            <p class="text-base text-body-color font-bold mb-2">Funkcionalita:</p>
                            <p class="text-base text-body-color mb-3 leading-5">Přidání checkboxu v kartě zboží (resp. variantě), který určuje, zda zboží smí být prodáno pouze firmě</p>
                            <p class="text-base text-body-color mb-3 leading-5">Přidání varovného oznámení pro zákazníky na stránce zboží</p>
                            <p class="text-base text-body-color mb-3 leading-5">Přidání varovného oznámení na stránce Checkout s uvedením restrikčního zboží</p>
                            <p class="text-base text-body-color mb-1 leading-5">Úprava formuláře Checkout pro nákup firmou v případě restrikčního zboží</p>
                        </div>
                        <a href="javascript:void(0)" class="w-full block text-base font-semibold text-white bg-primary border border-primary rounded-md text-center p-4 hover:bg-opacity-90 transition">
                            Objednat
                        </a>

                        <div>
                <span class="absolute right-0 top-7 z-[-1]">
                  <svg width="77" height="172" viewBox="0 0 77 172" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="86" cy="86" r="86" fill="url(#paint0_linear)" />
                    <defs>
                      <linearGradient id="paint0_linear" x1="86" y1="0" x2="86" y2="172" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#3056D3" stop-opacity="0.09" />
                        <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
                      </linearGradient>
                    </defs>
                  </svg>
                </span>
                            <span class="absolute right-4 top-4 z-[-1]">
                  <svg width="41" height="89" viewBox="0 0 41 89" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="38.9138" cy="87.4849" r="1.42021" transform="rotate(180 38.9138 87.4849)" fill="#3056D3" />
                    <circle cx="38.9138" cy="74.9871" r="1.42021" transform="rotate(180 38.9138 74.9871)" fill="#3056D3" />
                    <circle cx="38.9138" cy="62.4892" r="1.42021" transform="rotate(180 38.9138 62.4892)" fill="#3056D3" />
                    <circle cx="38.9138" cy="38.3457" r="1.42021" transform="rotate(180 38.9138 38.3457)" fill="#3056D3" />
                    <circle cx="38.9138" cy="13.634" r="1.42021" transform="rotate(180 38.9138 13.634)" fill="#3056D3" />
                    <circle cx="38.9138" cy="50.2754" r="1.42021" transform="rotate(180 38.9138 50.2754)" fill="#3056D3" />
                    <circle cx="38.9138" cy="26.1319" r="1.42021" transform="rotate(180 38.9138 26.1319)" fill="#3056D3" />
                    <circle cx="38.9138" cy="1.42021" r="1.42021" transform="rotate(180 38.9138 1.42021)" fill="#3056D3" />
                    <circle cx="26.4157" cy="87.4849" r="1.42021" transform="rotate(180 26.4157 87.4849)" fill="#3056D3" />
                    <circle cx="26.4157" cy="74.9871" r="1.42021" transform="rotate(180 26.4157 74.9871)" fill="#3056D3" />
                    <circle cx="26.4157" cy="62.4892" r="1.42021" transform="rotate(180 26.4157 62.4892)" fill="#3056D3" />
                    <circle cx="26.4157" cy="38.3457" r="1.42021" transform="rotate(180 26.4157 38.3457)" fill="#3056D3" />
                    <circle cx="26.4157" cy="13.634" r="1.42021" transform="rotate(180 26.4157 13.634)" fill="#3056D3" />
                    <circle cx="26.4157" cy="50.2754" r="1.42021" transform="rotate(180 26.4157 50.2754)" fill="#3056D3" />
                    <circle cx="26.4157" cy="26.1319" r="1.42021" transform="rotate(180 26.4157 26.1319)" fill="#3056D3" />
                    <circle cx="26.4157" cy="1.4202" r="1.42021" transform="rotate(180 26.4157 1.4202)" fill="#3056D3" />
                    <circle cx="13.9177" cy="87.4849" r="1.42021" transform="rotate(180 13.9177 87.4849)" fill="#3056D3" />
                    <circle cx="13.9177" cy="74.9871" r="1.42021" transform="rotate(180 13.9177 74.9871)" fill="#3056D3" />
                    <circle cx="13.9177" cy="62.4892" r="1.42021" transform="rotate(180 13.9177 62.4892)" fill="#3056D3" />
                    <circle cx="13.9177" cy="38.3457" r="1.42021" transform="rotate(180 13.9177 38.3457)" fill="#3056D3" />
                    <circle cx="13.9177" cy="13.634" r="1.42021" transform="rotate(180 13.9177 13.634)" fill="#3056D3" />
                    <circle cx="13.9177" cy="50.2754" r="1.42021" transform="rotate(180 13.9177 50.2754)" fill="#3056D3" />
                    <circle cx="13.9177" cy="26.1319" r="1.42021" transform="rotate(180 13.9177 26.1319)" fill="#3056D3" />
                    <circle cx="13.9177" cy="1.42019" r="1.42021" transform="rotate(180 13.9177 1.42019)" fill="#3056D3" />
                    <circle cx="1.41963" cy="87.4849" r="1.42021" transform="rotate(180 1.41963 87.4849)" fill="#3056D3" />
                    <circle cx="1.41963" cy="74.9871" r="1.42021" transform="rotate(180 1.41963 74.9871)" fill="#3056D3" />
                    <circle cx="1.41963" cy="62.4892" r="1.42021" transform="rotate(180 1.41963 62.4892)" fill="#3056D3" />
                    <circle cx="1.41963" cy="38.3457" r="1.42021" transform="rotate(180 1.41963 38.3457)" fill="#3056D3" />
                    <circle cx="1.41963" cy="13.634" r="1.42021" transform="rotate(180 1.41963 13.634)" fill="#3056D3" />
                    <circle cx="1.41963" cy="50.2754" r="1.42021" transform="rotate(180 1.41963 50.2754)" fill="#3056D3" />
                    <circle cx="1.41963" cy="26.1319" r="1.42021" transform="rotate(180 1.41963 26.1319)" fill="#3056D3" />
                    <circle cx="1.41963" cy="1.4202" r="1.42021" transform="rotate(180 1.41963 1.4202)" fill="#3056D3" />
                  </svg>
                </span>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 px-4">
                    <div class="bg-white rounded-xl relative z-10 overflow-hidden border border-primary border-opacity-20 shadow-pricing py-10 px-8 sm:p-12 lg:py-10 lg:px-6 xl:px-10 2xl:p-12 mb-10">
                        <span class="text-primary font-semibold text-lg block mb-8"> Střední plugin </span>
                        <h2 class="font-bold text-dark mb-5 text-[30px]">
                            8.000 - 12.000 Kč
                        </h2>
                        <p class="text-base text-body-color pb-8 mb-8 border-b border-[#F2F2F2] min-h-[130px]">Středně velký plugin s větším zásahem do funkcionality webu, využitím API a interaktivity.</p>
                        <p class="text-base text-body-color mb-2 font-bold">Přiklad:</p>
                        <p class="text-base text-body-color pb-4 mb-2 border-b border-[#F2F2F2] min-h-[90px]">Plugin pro WooCommerce pro zadávání a správu sledovacích čísel zásilek.</p>
                        <div class="mb-7 min-h-[460px]">
                            <p class="text-base text-body-color font-bold mb-2">Funkcionalita:</p>
                            <p class="text-base text-body-color mb-3 leading-5">Možnost zadat sledovací číslo a přepravce v kartě objednávky</p>
                            <p class="text-base text-body-color mb-3 leading-5">Uložení sledovacího čísla, data odeslání a poskytovatele služeb</p>
                            <p class="text-base text-body-color mb-3 leading-5">Záznam v admin notes, možnost odstranění údajů jedním kliknutím</p>
                            <p class="text-base text-body-color mb-3 leading-5">Automatická změna statusu objednávky po zadání údajů</p>
                            <p class="text-base text-body-color mb-1 leading-5">Přidání sledovacích informací do e-mailu klientovi, do osobních stránek klienta, včetně přímého odkazu pro sledování zásilky</p>
                        </div>
                        <a href="javascript:void(0)" class="w-full block text-base font-semibold text-white bg-primary border border-primary rounded-md text-center p-4 hover:bg-opacity-90 transition">
                            Objednat
                        </a>

                        <div>
                <span class="absolute right-0 top-7 z-[-1]">
                  <svg width="77" height="172" viewBox="0 0 77 172" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="86" cy="86" r="86" fill="url(#paint0_linear)" />
                    <defs>
                      <linearGradient id="paint0_linear" x1="86" y1="0" x2="86" y2="172" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#3056D3" stop-opacity="0.09" />
                        <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
                      </linearGradient>
                    </defs>
                  </svg>
                </span>
                            <span class="absolute right-4 top-4 z-[-1]">
                  <svg width="41" height="89" viewBox="0 0 41 89" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="38.9138" cy="87.4849" r="1.42021" transform="rotate(180 38.9138 87.4849)" fill="#3056D3" />
                    <circle cx="38.9138" cy="74.9871" r="1.42021" transform="rotate(180 38.9138 74.9871)" fill="#3056D3" />
                    <circle cx="38.9138" cy="62.4892" r="1.42021" transform="rotate(180 38.9138 62.4892)" fill="#3056D3" />
                    <circle cx="38.9138" cy="38.3457" r="1.42021" transform="rotate(180 38.9138 38.3457)" fill="#3056D3" />
                    <circle cx="38.9138" cy="13.634" r="1.42021" transform="rotate(180 38.9138 13.634)" fill="#3056D3" />
                    <circle cx="38.9138" cy="50.2754" r="1.42021" transform="rotate(180 38.9138 50.2754)" fill="#3056D3" />
                    <circle cx="38.9138" cy="26.1319" r="1.42021" transform="rotate(180 38.9138 26.1319)" fill="#3056D3" />
                    <circle cx="38.9138" cy="1.42021" r="1.42021" transform="rotate(180 38.9138 1.42021)" fill="#3056D3" />
                    <circle cx="26.4157" cy="87.4849" r="1.42021" transform="rotate(180 26.4157 87.4849)" fill="#3056D3" />
                    <circle cx="26.4157" cy="74.9871" r="1.42021" transform="rotate(180 26.4157 74.9871)" fill="#3056D3" />
                    <circle cx="26.4157" cy="62.4892" r="1.42021" transform="rotate(180 26.4157 62.4892)" fill="#3056D3" />
                    <circle cx="26.4157" cy="38.3457" r="1.42021" transform="rotate(180 26.4157 38.3457)" fill="#3056D3" />
                    <circle cx="26.4157" cy="13.634" r="1.42021" transform="rotate(180 26.4157 13.634)" fill="#3056D3" />
                    <circle cx="26.4157" cy="50.2754" r="1.42021" transform="rotate(180 26.4157 50.2754)" fill="#3056D3" />
                    <circle cx="26.4157" cy="26.1319" r="1.42021" transform="rotate(180 26.4157 26.1319)" fill="#3056D3" />
                    <circle cx="26.4157" cy="1.4202" r="1.42021" transform="rotate(180 26.4157 1.4202)" fill="#3056D3" />
                    <circle cx="13.9177" cy="87.4849" r="1.42021" transform="rotate(180 13.9177 87.4849)" fill="#3056D3" />
                    <circle cx="13.9177" cy="74.9871" r="1.42021" transform="rotate(180 13.9177 74.9871)" fill="#3056D3" />
                    <circle cx="13.9177" cy="62.4892" r="1.42021" transform="rotate(180 13.9177 62.4892)" fill="#3056D3" />
                    <circle cx="13.9177" cy="38.3457" r="1.42021" transform="rotate(180 13.9177 38.3457)" fill="#3056D3" />
                    <circle cx="13.9177" cy="13.634" r="1.42021" transform="rotate(180 13.9177 13.634)" fill="#3056D3" />
                    <circle cx="13.9177" cy="50.2754" r="1.42021" transform="rotate(180 13.9177 50.2754)" fill="#3056D3" />
                    <circle cx="13.9177" cy="26.1319" r="1.42021" transform="rotate(180 13.9177 26.1319)" fill="#3056D3" />
                    <circle cx="13.9177" cy="1.42019" r="1.42021" transform="rotate(180 13.9177 1.42019)" fill="#3056D3" />
                    <circle cx="1.41963" cy="87.4849" r="1.42021" transform="rotate(180 1.41963 87.4849)" fill="#3056D3" />
                    <circle cx="1.41963" cy="74.9871" r="1.42021" transform="rotate(180 1.41963 74.9871)" fill="#3056D3" />
                    <circle cx="1.41963" cy="62.4892" r="1.42021" transform="rotate(180 1.41963 62.4892)" fill="#3056D3" />
                    <circle cx="1.41963" cy="38.3457" r="1.42021" transform="rotate(180 1.41963 38.3457)" fill="#3056D3" />
                    <circle cx="1.41963" cy="13.634" r="1.42021" transform="rotate(180 1.41963 13.634)" fill="#3056D3" />
                    <circle cx="1.41963" cy="50.2754" r="1.42021" transform="rotate(180 1.41963 50.2754)" fill="#3056D3" />
                    <circle cx="1.41963" cy="26.1319" r="1.42021" transform="rotate(180 1.41963 26.1319)" fill="#3056D3" />
                    <circle cx="1.41963" cy="1.4202" r="1.42021" transform="rotate(180 1.41963 1.4202)" fill="#3056D3" />
                  </svg>
                </span>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 px-4">
                    <div class="bg-white rounded-xl relative z-10 overflow-hidden border border-primary border-opacity-20 shadow-pricing py-10 px-8 sm:p-12 lg:py-10 lg:px-6 xl:px-10 2xl:p-12 mb-10">
                        <span class="text-primary font-semibold text-lg block mb-8"> Velký plugin </span>
                        <h2 class="font-bold text-dark mb-5 text-[30px]">
                            od 15.000 Kč
                        </h2>
                        <p class="text-base text-body-color pb-8 mb-8 border-b border-[#F2F2F2] min-h-[130px]">Komplexní pluginy s větším zásahem do funkcionality webu nebo širokým rozsahem vlastní funkcionality, včetně komunikace s externími systémy a API.</p>
                        <p class="text-base text-body-color mb-2 font-bold">Přiklad:</p>
                        <p class="text-base text-body-color pb-4 mb-2 border-b border-[#F2F2F2] min-h-[90px]">Vícemodulový plugin pro export dat z objednávek WooCommerce.</p>
                        <div class="mb-7 min-h-[460px]">

                            <p class="text-base text-body-color font-bold mb-2">Funkcionalita:</p>
                            <p class="text-base text-body-color mb-3 leading-5">Generace, editace a uložení PDF faktur, zálohových faktur nebo dobropisů</p>
                            <p class="text-base text-body-color mb-3 leading-5">Možnost odeslání vygenerovaných dokumentů zákazníkovi e-mailem</p>
                            <p class="text-base text-body-color mb-3 leading-5">Podpora prodeje v EU v režimu OSS s použitím DPH cílové země</p>
                            <p class="text-base text-body-color mb-3 leading-5">Individuální kurz pro faktury a objednávky v cizí měně</p>
                            <p class="text-base text-body-color mb-3 leading-5">Export a generace XML reportů pro specializovaný účetní software na základě vybraného seznamu objednávek (samostatný modul)</p>
                            <p class="text-base text-body-color mb-3 leading-5">Export a generace CSV reportů pro přípravu EU OSS VAT reportu (samostatný modul)</p>

                            <p class="text-base text-body-color mb-1 leading-5">Úprava formuláře Checkout pro nákup firmou v případě restrikčního zboží</p>
                        </div>
                        <a href="javascript:void(0)" class="w-full block text-base font-semibold text-white bg-primary border border-primary rounded-md text-center p-4 hover:bg-opacity-90 transition">
                            Objednat
                        </a>

                        <div>
                <span class="absolute right-0 top-7 z-[-1]">
                  <svg width="77" height="172" viewBox="0 0 77 172" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="86" cy="86" r="86" fill="url(#paint0_linear)" />
                    <defs>
                      <linearGradient id="paint0_linear" x1="86" y1="0" x2="86" y2="172" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#3056D3" stop-opacity="0.09" />
                        <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
                      </linearGradient>
                    </defs>
                  </svg>
                </span>
                            <span class="absolute right-4 top-4 z-[-1]">
                  <svg width="41" height="89" viewBox="0 0 41 89" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="38.9138" cy="87.4849" r="1.42021" transform="rotate(180 38.9138 87.4849)" fill="#3056D3" />
                    <circle cx="38.9138" cy="74.9871" r="1.42021" transform="rotate(180 38.9138 74.9871)" fill="#3056D3" />
                    <circle cx="38.9138" cy="62.4892" r="1.42021" transform="rotate(180 38.9138 62.4892)" fill="#3056D3" />
                    <circle cx="38.9138" cy="38.3457" r="1.42021" transform="rotate(180 38.9138 38.3457)" fill="#3056D3" />
                    <circle cx="38.9138" cy="13.634" r="1.42021" transform="rotate(180 38.9138 13.634)" fill="#3056D3" />
                    <circle cx="38.9138" cy="50.2754" r="1.42021" transform="rotate(180 38.9138 50.2754)" fill="#3056D3" />
                    <circle cx="38.9138" cy="26.1319" r="1.42021" transform="rotate(180 38.9138 26.1319)" fill="#3056D3" />
                    <circle cx="38.9138" cy="1.42021" r="1.42021" transform="rotate(180 38.9138 1.42021)" fill="#3056D3" />
                    <circle cx="26.4157" cy="87.4849" r="1.42021" transform="rotate(180 26.4157 87.4849)" fill="#3056D3" />
                    <circle cx="26.4157" cy="74.9871" r="1.42021" transform="rotate(180 26.4157 74.9871)" fill="#3056D3" />
                    <circle cx="26.4157" cy="62.4892" r="1.42021" transform="rotate(180 26.4157 62.4892)" fill="#3056D3" />
                    <circle cx="26.4157" cy="38.3457" r="1.42021" transform="rotate(180 26.4157 38.3457)" fill="#3056D3" />
                    <circle cx="26.4157" cy="13.634" r="1.42021" transform="rotate(180 26.4157 13.634)" fill="#3056D3" />
                    <circle cx="26.4157" cy="50.2754" r="1.42021" transform="rotate(180 26.4157 50.2754)" fill="#3056D3" />
                    <circle cx="26.4157" cy="26.1319" r="1.42021" transform="rotate(180 26.4157 26.1319)" fill="#3056D3" />
                    <circle cx="26.4157" cy="1.4202" r="1.42021" transform="rotate(180 26.4157 1.4202)" fill="#3056D3" />
                    <circle cx="13.9177" cy="87.4849" r="1.42021" transform="rotate(180 13.9177 87.4849)" fill="#3056D3" />
                    <circle cx="13.9177" cy="74.9871" r="1.42021" transform="rotate(180 13.9177 74.9871)" fill="#3056D3" />
                    <circle cx="13.9177" cy="62.4892" r="1.42021" transform="rotate(180 13.9177 62.4892)" fill="#3056D3" />
                    <circle cx="13.9177" cy="38.3457" r="1.42021" transform="rotate(180 13.9177 38.3457)" fill="#3056D3" />
                    <circle cx="13.9177" cy="13.634" r="1.42021" transform="rotate(180 13.9177 13.634)" fill="#3056D3" />
                    <circle cx="13.9177" cy="50.2754" r="1.42021" transform="rotate(180 13.9177 50.2754)" fill="#3056D3" />
                    <circle cx="13.9177" cy="26.1319" r="1.42021" transform="rotate(180 13.9177 26.1319)" fill="#3056D3" />
                    <circle cx="13.9177" cy="1.42019" r="1.42021" transform="rotate(180 13.9177 1.42019)" fill="#3056D3" />
                    <circle cx="1.41963" cy="87.4849" r="1.42021" transform="rotate(180 1.41963 87.4849)" fill="#3056D3" />
                    <circle cx="1.41963" cy="74.9871" r="1.42021" transform="rotate(180 1.41963 74.9871)" fill="#3056D3" />
                    <circle cx="1.41963" cy="62.4892" r="1.42021" transform="rotate(180 1.41963 62.4892)" fill="#3056D3" />
                    <circle cx="1.41963" cy="38.3457" r="1.42021" transform="rotate(180 1.41963 38.3457)" fill="#3056D3" />
                    <circle cx="1.41963" cy="13.634" r="1.42021" transform="rotate(180 1.41963 13.634)" fill="#3056D3" />
                    <circle cx="1.41963" cy="50.2754" r="1.42021" transform="rotate(180 1.41963 50.2754)" fill="#3056D3" />
                    <circle cx="1.41963" cy="26.1319" r="1.42021" transform="rotate(180 1.41963 26.1319)" fill="#3056D3" />
                    <circle cx="1.41963" cy="1.4202" r="1.42021" transform="rotate(180 1.41963 1.4202)" fill="#3056D3" />
                  </svg>
                </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ====== Pricing Section End -->

    <!-- ====== Contact Section Start  -->
    <section id="contact" class="py-[120px]">
        <div class="container">
            <div class="flex flex-wrap mx-[-16px]">
                <div class="w-full px-4">
                    <div class="max-w-[600px] mx-auto text-center mb-[50px]">
                        <span class="font-semibold text-lg text-primary block mb-2"> KONTAKT </span>
                        <h2 class="font-bold text-black text-3xl sm:text-4xl md:text-[45px] mb-5 ">Potřebujete probrat nápad na nový WordPress plugin?</h2>
                        <p class="font-medium text-lg text-body-color">Neváhejte nám svůj nápad podrobně popsat. Čím více informací nám poskytnete, tím lépe se v něm dokážeme zorientovat a nabídnout lepší a racionálnější řešení.</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center -mx-4">
                <div class="w-full lg:w-9/12 px-4">
                    <form>
                        <div class="flex flex-wrap -mx-4">
                            <div class="w-full md:w-1/2 px-4">
                                <div class="mb-6">
                                    <input type="text" placeholder="Vaše jméno" class="input-field" />
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-4">
                                <div class="mb-6">
                                    <input type="text" placeholder="Společnost (volitelné)" class="input-field" />
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-4">
                                <div class="mb-6">
                                    <input type="email" placeholder="Váš e-mail" class="input-field" />
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-4">
                                <div class="mb-6">
                                    <input type="text" placeholder="Telefonní číslo" class="input-field" />
                                </div>
                            </div>
                            <div class="w-full px-4">
                                <div class="mb-6">
                                    <textarea rows="4" placeholder="Popište nám svůj projekt" class="input-field resize-none"></textarea>
                                </div>
                            </div>
                            <div class="w-full px-4">
                                <div class="pt-4 text-center">
                                    <button
                                        class="inline-flex justify-center items-center py-4 px-9 rounded-full font-semibold text-white bg-primary mx-auto transition duration-300 ease-in-out hover:shadow-signUp hover:bg-opacity-90"
                                    >
                                        Odeslat
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Contact Section End  -->

    @push('scripts')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endpush
    @push('scripts')
        <script>
            // Document Loaded
            document.addEventListener('DOMContentLoaded', () => {
                const pageLink = document.querySelectorAll(".menu-scroll");
                //console.log(pageLink);
                pageLink.forEach((elem) => {
                    elem.addEventListener("click", (e) => {
                        e.preventDefault();
                        let href = elem.getAttribute("href");
                        window.history.pushState({}, '', href);
                        document.querySelector(href).scrollIntoView({
                            behavior: "smooth",
                            offsetTop: 1 - 60,
                        });
                    });
                });
                // section menu active
                function onScroll(event) {
                    const sections = document.querySelectorAll(".menu-scroll");
                    const scrollPos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;

                    for (let i = 0; i < sections.length; i++) {
                        const currLink = sections[i];
                        const val = currLink.getAttribute("href");
                        const refElement = document.querySelector(val);
                        const scrollTopMinus = scrollPos + 73;
                        if (refElement.offsetTop <= scrollTopMinus && refElement.offsetTop + refElement.offsetHeight > scrollTopMinus) {
                            document.querySelector(".menu-scroll").classList.remove("active");
                            currLink.classList.add("active");
                        } else {
                            currLink.classList.remove("active");
                        }
                    }
                }

                window.document.addEventListener("scroll", onScroll);
            });
        </script>
    @endpush
</x-public.layouts.base-layout>



