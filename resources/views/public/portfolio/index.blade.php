<x-public.layouts.base-layout title="Naše práce">

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
                <div class="w-full xl:w-10/12 px-4">
                    <div class="items-wrapper flex flex-wrap justify-center mx-[-16px]">
                        <x-public.portfolio-item
                            id="1"
                            url="resources/images/public/portfolio/portfolio-01.jpg"
                            alt="Image"
                        >
                            <x-slot:title>Startup landing page</x-slot>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae dolor ultrices libero.
                        </x-public.portfolio-item>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-public.layouts.base-layout>
