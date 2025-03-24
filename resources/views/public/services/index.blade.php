<x-public.layouts.base-layout title="Naše služby">
    <!-- ====== Services Section Start -->
    <section id="services" class="bg-[#f8f9ff] pt-20 lg:pt-[120px] pb-12 lg:pb-[90px]">
        <div class="container">
            <div class="flex flex-wrap items-end -mx-4 mb-10 lg:mb-[60px]">
                <div class="w-full lg:w-8/12 px-4">
                    <div class="max-w-[625px] mb-5">
                        <span class="font-semibold text-lg text-primary mb-2 block"> NAŠE SLUŽBY </span>
                        <h2 class="font-bold text-3xl sm:text-4xl md:text-[40px] text-black">Podívejte se na kompletní nabídku našich služeb</h2>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap justify-center -mx-4">
                @foreach($services as $service)
                    <x-public.services-item
                        :href="route('services.show', $service->slug)"
                        :title="$service->title"
                        :img="$service->thumbnail"
                        :alt="$service->slug . '-image'"
                    >
                        {{ $service->description }}
                    </x-public.services-item>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ====== Services Section End -->

</x-public.layouts.base-layout>
