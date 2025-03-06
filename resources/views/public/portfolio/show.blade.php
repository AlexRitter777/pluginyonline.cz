<x-public.layouts.base-layout title="!!!!">

    <!-- ====== Page Title Section Start -->
    <section class="relative z-10 pt-[150px] pb-[90px] mb-20 overflow-hidden">
        <div class="container">
            <div class="flex flex-wrap items-center mx-[-16px]">
                <div class="w-full md:w-8/12 lg:w-7/12 px-4">
                    <div class="max-w-[570px] mb-12 md:mb-0">
                        <h1 class="font-bold text-black text-2xl sm:text-3xl mb-5">Portfolio Details Page. Id: {{ $id }}</h1>
                        <p class="font-medium text-base text-body-color leading-relaxed">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In varius eros eget sapien consectetur ultrices. Ut quis dapibus libero.
                        </p>
                    </div>
                </div>
                {{--Bread Crumbs Strart--}}
                <div class="w-full md:w-4/12 lg:w-5/12 px-4">
                    <div class="text-end">
                        <ul class="flex items-center md:justify-end">
                            <li class="flex items-center">
                                <a href="{{ route('portfolio.index') }}" class="font-medium text-base text-body-color pr-1 hover:text-primary"> Všechny projekty </a>
                                <span class="block w-2 h-2 border-t-2 border-r-2 border-body-color rotate-45 mr-3"></span>
                            </li>
                            <li class="font-medium text-base text-primary">Portfolio Details</li>
                        </ul>
                    </div>
                </div>
                {{--Bread Crumbs End--}}
            </div>
        </div>
        {{--Decorative Rectangles Start--}}
        <div>
            <span class="absolute bottom-0 left-0 z-[-1]">
              <svg width="730" height="206" viewBox="0 0 730 206" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.08" width="136.991" height="563.705" transform="matrix(0.632736 0.774368 0.774368 -0.632736 -201.278 330.677)" fill="url(#paint0_linear_0:1)" />
                <rect opacity="0.05" width="345.355" height="563.705" transform="matrix(0.632736 0.774368 0.774368 -0.632736 74 330.677)" fill="url(#paint1_linear_0:1)" />
                <defs>
                  <linearGradient id="paint0_linear_0:1" x1="68.4956" y1="0" x2="68.4956" y2="563.705" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#4A6CF7" />
                    <stop offset="1" stop-color="#4A6CF7" stop-opacity="0" />
                  </linearGradient>
                  <linearGradient id="paint1_linear_0:1" x1="172.678" y1="0" x2="172.678" y2="563.705" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#4A6CF7" />
                    <stop offset="1" stop-color="#4A6CF7" stop-opacity="0" />
                  </linearGradient>
                </defs>
              </svg>
            </span>
            <span class="absolute top-0 right-0 z-[-1]">
              <svg width="405" height="206" viewBox="0 0 405 206" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.08" width="289.718" height="563.705" transform="matrix(-0.707107 -0.707107 -0.707107 0.707107 603.461 -125.138)" fill="url(#paint0_linear_54:595)" />
                <defs>
                  <linearGradient id="paint0_linear_54:595" x1="144.859" y1="0" x2="144.859" y2="563.705" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#4A6CF7" />
                    <stop offset="1" stop-color="#4A6CF7" stop-opacity="0" />
                  </linearGradient>
                </defs>
              </svg>
            </span>
        </div>
        {{--Decorative Rectangles End--}}
    </section>
    <!-- ====== Page Title Section End -->

    <!-- ====== Blog Section Start -->
    <section class="pb-20">
        <div class="container">
            <div class="flex flex-wrap -mx-5">
                <div class="w-full lg:w-8/12 px-5">
                    <div>
                        <div class="project-images-carousel flex lg:h-[520px] h-auto relative mb-6">
                            <div class="flex-1 overflow-hidden flex items-center justify-center lg:justify-start">
                                <img
                                    src="/img/cars/Lexus-RX200t-2016/1.jpeg"
                                    alt=""
                                    class="max-w-full max-h-full rounded-xl object-cover"
                                    id="activeImage"
                                />
                            </div>
                            <div class="project-image-thumbnails hidden lg:block w-[110px] p-[5px] overflow-x-hidden overflow-y-auto">
                                <img src="/img/cars/Lexus-RX200t-2016/1.jpeg" class="w-full h-[80px] rounded object-contain cursor-pointer" alt="" />
                                <img src="/img/cars/Lexus-RX200t-2016/2.jpeg" class="w-full h-[80px] rounded object-contain cursor-pointer" alt="" />
                                <img src="/img/cars/Lexus-RX200t-2016/3.jpeg" class="w-full h-[80px] rounded object-contain cursor-pointer" alt="" />
                                <img src="/img/cars/Lexus-RX200t-2016/4.jpeg" class="w-full h-[80px] rounded object-contain cursor-pointer" alt="" />
                                <img src="/img/cars/Lexus-RX200t-2016/5.jpeg" class="w-full h-[80px] rounded object-contain cursor-pointer" alt="" />
                                <img src="/img/cars/Lexus-RX200t-2016/6.jpeg" class="w-full h-[80px] rounded object-contain cursor-pointer" alt="" />
                                <img src="/img/cars/Lexus-RX200t-2016/7.jpeg" class="w-full h-[80px] rounded object-contain cursor-pointer" alt="" />
                            </div>
                            <button class="carousel-button prev-button" id="prevButton">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    style="width: 64px"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15.75 19.5 8.25 12l7.5-7.5"
                                    />
                                </svg>
                            </button>
                            <button class="carousel-button next-button" id="nextButton">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    style="width: 64px"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m8.25 4.5 7.5 7.5-7.5 7.5"
                                    />
                                </svg>
                            </button>
                        </div>
                        <h3 class="font-bold text-black text-2xl sm:text-4xl lg:text-3xl mb-7">Professional graphics design</h3>
                        <p class="text-base sm:text-lg lg:text-base xl:text-lg text-body-color mb-8">
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat.
                        </p>
                        <p class="text-base sm:text-lg lg:text-base xl:text-lg text-body-color mb-10">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Neque sodales ut
                            etiam sit amet. Ligula ullamcorper proin libero nunc consequat interdum varius. Quam pellentesque nec nam.
                        </p>
                        <h4 class="font-bold text-xl sm:text-2xl lg:text-xl xl:text-2xl text-black mb-8"><span class="text-primary">01.</span> Marketing solutions</h4>
                        <ul class="list list-inside list-disc mb-7">
                            <li class="text-base sm:text-lg lg:text-base xl:text-lg text-primary mb-3">
                                <span class="text-body-color"> Consectetur adipiscing elit in voluptate velit. </span>
                            </li>
                            <li class="text-base sm:text-lg lg:text-base xl:text-lg text-primary mb-3">
                                <span class="text-body-color"> Mattis vulputate cupidatat. </span>
                            </li>
                            <li class="text-base sm:text-lg lg:text-base xl:text-lg text-primary mb-3">
                                <span class="text-body-color"> Vulputate enim nulla aliquet porttitor odio pellentesque </span>
                            </li>
                            <li class="text-base sm:text-lg lg:text-base xl:text-lg text-primary mb-3">
                                <span class="text-body-color"> Ligula ullamcorper malesuada proin </span>
                            </li>
                        </ul>
                        <p class="text-base sm:text-lg lg:text-base xl:text-lg text-body-color mb-10">
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat.
                        </p>
                        <h4 class="font-bold text-xl sm:text-2xl lg:text-xl xl:text-2xl text-black mb-8"><span class="text-primary">02.</span> Branding solutions</h4>
                        <p class="text-base sm:text-lg lg:text-base xl:text-lg text-body-color mb-8">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis enim lobortis scelerisque fermentum. Neque sodales ut
                            etiam sit door telium sieat amet.
                        </p>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 px-5">
                    <div class="bg-[#F8F9FF] border border-[#D7DFFF] py-9 px-6 sm:p-9 lg:px-6 xl:px-5 rounded-sm mb-10">
                        <h3 class="font-bold text-primary text-[22px] mb-7">Informace o projektu</h3>
                        <ul>
                            <x-public.project-prop-item title="Název" desc="Woocommerce RW Order Data Export"/>
                            <x-public.project-prop-item title="Druh" desc="Plugin na míru"/>
                            <x-public.project-prop-item title="Určení" desc="E-shopy zdravotníckých potřeb"/>
                            <x-public.project-prop-item title="Hlavní funkce" desc="Vytvořrní PDF dokumentů, exporty objednávek v PDF, XML, CSV"/>
                            <x-public.project-prop-item title="Potřebuje" desc="WooCommerce"/>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Blog Section End -->


</x-public.layouts.base-layout>
