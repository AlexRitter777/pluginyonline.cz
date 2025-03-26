<x-public.layouts.preview-layout :title="$service->title">
    <section id="services" class="bg-[#f8f9ff] pt-20 lg:pt-[120px] pb-12 lg:pb-[90px]">
        <div class="container">
            <div class="flex flex-wrap justify-center -mx-4">

                @for($i=1; $i<=3; $i++)

                    <x-public.services-item
                        :href="route('admin.services.single', $service->slug)"
                        :title="$service->title"
                        :img="$service->thumbnail"
                        :alt="$service->slug . '-image'"
                    >
                        {{ $service->description }}
                    </x-public.services-item>

               @endfor
            </div>
        </div>
    </section>


</x-public.layouts.preview-layout>
