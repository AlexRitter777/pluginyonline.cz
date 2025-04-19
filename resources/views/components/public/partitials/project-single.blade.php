@props([
    'title' => '',
    'description' => '',
    'backUrl' => '',
    'images' => [],
    'content' => '',
    'name' => '',
    'type' => '',
    'purpose' => '',
    'features' => '',
    'requirements' => ''
])


{{--Page Title Section Start--}}
<section class="relative z-10 pt-[150px] pb-[40px] mb-10 overflow-hidden">
    <div class="container">
        <div class="flex flex-col items-center mx-[-16px]">

            <div class="w-full px-4">
                <div class="lg:max-w-[570px] mb-12">
                    <h1 class="font-bold text-black text-2xl sm:text-3xl mb-5">{{ $title }}</h1>
                    <p class="font-medium text-base text-body-color leading-relaxed">
                        {{ $description }}
                    </p>
                </div>
            </div>

            <div class="flex items-center w-full flex-start px-4">
                <span class="block w-2 h-2 border-t-2 border-r-2 border-body-color rotate-[-135deg] mr-3"></span>
                <a href="{{ $backUrl }}" class="font-medium text-base text-body-color pr-1 hover:text-primary">
                    Zpět na seznam projektů
                </a>
            </div>

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
{{--Page Title Section End--}}

{{--Blog Section Start--}}
<section class="pb-20">
    <div class="container">
        <div id="content-container" class="flex flex-wrap -mx-5">
            <div class="w-full lg:w-8/12 px-5">
                <div id="carousel-container">

                    {{--Project Images Carousel Start--}}
                    @if(count($images) != 0)
                        <div class="project-images-carousel flex {{--lg:h-[520px]--}} h-auto relative mb-6 items-center">
                            <div class="flex-1 overflow-hidden flex items-center justify-center lg:justify-start">
                                <img
                                    src="{{asset($images[0]->path)}}"
                                    alt=""
                                    class="max-w-full max-h-full rounded-xl object-cover"
                                    id="activeImage"
                                />
                            </div>
                            <div class="project-image-thumbnails hidden lg:block h-[340px] xl:h-[430px] 2xl:h-[520px] w-[110px] p-[5px] overflow-x-hidden overflow-y-auto">

                                @foreach($images as $image)
                                    <img src="{{asset($image->path)}}" class="w-full h-[80px] rounded object-contain cursor-pointer" alt=""/>
                                @endforeach

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
                    @endif
                    {{--Project Images Carousel End--}}
                    <div id="portfolio-content" class="w-full px-5 lg:px-0">
                        {{ $slot }}
                    </div>

                </div>
            </div>

            {{--Project info card--}}
            <div class="w-full lg:w-4/12 px-5">
                <div class="bg-[#F8F9FF] border border-[#D7DFFF] py-9 px-6 sm:p-9 lg:px-6 xl:px-5 rounded-sm mb-10">
                    <h3 class="font-bold text-primary text-[22px] mb-7">Informace o projektu</h3>
                    <ul>
                        <x-public.project-prop-item title="Název">
                            {{ $name }}
                        </x-public.project-prop-item>
                        <x-public.project-prop-item title="Druh">
                            {{ $type }}
                        </x-public.project-prop-item>
                        <x-public.project-prop-item title="Určení">
                            {{ $purpose }}
                        </x-public.project-prop-item>
                        <x-public.project-prop-item title="Hlavní funkce">
                            {{ $features }}
                        </x-public.project-prop-item>
                        <x-public.project-prop-item title="Potřebuje">
                            {{ $requirements }}
                        </x-public.project-prop-item>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
{{--Blog Section Start--}}
