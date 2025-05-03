@props([
   'backgroundColor' => '',
   'titleColor' => '',
   'backUrl' => '',
   'services' => [],
   'allServices' => true,
   'preview' => false
])

<section id="services" class=" bg-{{ $backgroundColor }} pt-20 lg:pt-[120px] pb-12 lg:pb-[90px]">
    <div class="container">
        <div class="flex flex-wrap items-end -mx-4 mb-10 lg:mb-[60px]">
            <div class="w-full lg:w-8/12 px-4">
                <div class="max-w-[625px] mb-5">
                    <span class="font-semibold text-lg text-primary mb-2 block"> NAŠE SLUŽBY </span>
                    <h2 class="font-bold text-3xl sm:text-4xl md:text-[40px] text-{{ $titleColor }}">Přidáváme vašim webům unikátní vzhled a funkcionalitu</h2>
                </div>
            </div>
            @if($allServices)
            <div class="w-full lg:w-4/12 px-4">
                <div class="flex lg:justify-end mb-5">
                    <a href="{{ $backUrl }}" class="text-lg font-medium text-white underline hover:text-primary"> VŠECHNY SLUŽBY </a>
                </div>
            </div>
            @endif
        </div>
        <div class="flex flex-wrap justify-center -mx-4">
            @foreach($services as $service)
                <x-public.services-item
                    :showRoute="!$preview ? route('services.show', $service->slug) : route('admin.services.single', $service->slug)"
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

