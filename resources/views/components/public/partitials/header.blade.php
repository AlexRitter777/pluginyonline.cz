{{-- Navbar Section Start --}}
<header class="header bg-transparent absolute top-0 left-0 z-40 w-full flex items-center transition">
    <div class="container">
        <div class="flex mx-[-16px] items-center justify-between relative">
            <div class="px-4 w-[20rem] max-w-full">
                <a href="/" class="header-logo w-full block py-6 lg:py-8">
                   <img src="{{asset('img/logo/PluginyOnlineLogo_transparent.png')}}" width="200" alt="logo" class="w-full" />
{{--                    <h1 class="font-bold text-2xl">{{ config('app.name') }}</h1>--}}
                </a>
            </div>
            <div class="flex px-4 justify-between items-center w-full">
                <div>
                    <button
                        id="navbarToggler"
                        name="navbarToggler"
                        aria-label="navbarToggler"
                        class="block absolute right-4 top-1/2 translate-y-[-50%] lg:hidden focus:ring-2 ring-primary px-3 py-[6px] rounded-lg"
                    >
                        <span class="relative w-[30px] h-[2px] my-[6px] block bg-dark"></span>
                        <span class="relative w-[30px] h-[2px] my-[6px] block bg-dark"></span>
                        <span class="relative w-[30px] h-[2px] my-[6px] block bg-dark"></span>
                    </button>
                    <nav
                        id="navbarCollapse"
                        class="absolute py-5 lg:py-0 lg:px-4 xl:px-6 bg-white lg:bg-transparent shadow-lg rounded-lg max-w-[250px] w-full lg:max-w-full lg:w-full right-4 top-full hidden lg:block lg:static lg:shadow-none"
                    >
                        @if(\Illuminate\Support\Facades\Route::currentRouteName()==='home')
                            <x-public.header-items-home/>
                        @else
                            <x-public.header-items-pages/>
                        @endif

                    </nav>
                </div>
                <div class="sm:flex justify-end hidden pr-16 lg:pr-0">
                    <a
                        href="{{\Illuminate\Support\Facades\Route::currentRouteName()==='home' ? '#kontakt': 'kontakt'}}"
                        class="text-base font-bold text-white bg-primary rounded-full py-3 px-8 md:px-9 lg:px-8 xl:px-9
                               hover:shadow-signUp hover:bg-opacity-90 transition ease-in-out duration-300"
                    >
                        Poptat plugin
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
{{-- Navbar Section End --}}
