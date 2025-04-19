@props([
    'portfolios' => [],
    'allProjectsUrl' => '',
    'allProjects' => true,
    'pagination' => false,
    'preview' => false

])

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
                            :showRoute="!$preview ? route('portfolio.show', ['id' => $portfolio->id]) : route('admin.portfolio.single', ['portfolio' => $portfolio])"
                        >
                            <x-slot:title>{{ $portfolio->title }}</x-slot>
                            {{ $portfolio->description }}
                        </x-public.portfolio-item>
                    @endforeach
                </div>
            </div>
        @else
            <p class="font-semibold text-black text-xl inline-block mb-3">
                My first project is on its way — coming soon!
            </p>
        @endif
        </div>
        @if($portfolios && $allProjects)
        <div class="flex flex-wrap mx-[-16px]">
            <div class="w-full px-4">
                <div class="max-w-[600px] mx-auto text-center mb-[50px]">
                    <a href="{{ $allProjectsUrl }}" class="text-lg font-medium uppercase underline hover:text-primary"> Všechny projekty </a>
                </div>
            </div>
        </div>
        @endif
        @if($pagination)
            {{ $portfolios->links('vendor.pagination.public') }}
        @endif
    </div>
</section>

