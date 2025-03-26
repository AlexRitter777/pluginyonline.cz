<header class="header bg-transparent absolute top-0 left-0 z-40 w-full flex items-center transition">
    <div class="container">
        <div class="flex mx-[-16px] items-center justify-between relative">
            <div class="px-4 w-60 max-w-full">
                <a href="javascript:void(0)" class="header-logo w-full block py-6 lg:py-8">
                    <h1 class="font-bold text-2xl">{{ config('app.name') }}</h1>
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
                    </div>
                <div class="sm:flex justify-end hidden pr-16 lg:pr-0">
                    <h3 class="">Preview</h3>
                </div>
            </div>
        </div>
    </div>
</header>

