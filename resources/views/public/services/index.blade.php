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
                <x-public.services-item
                    href="{{ route('services.show', ['id' => 1]) }}"
                    title="Vývoj pluginů pro WordPress"
                    img="resources/images/public/services/service-01.jpg"
                    alt="image-1"
                >
                    Rychle a spolehlivě vyvíjíme pluginy pro CMS WordPress na základě požadavků klienta. Přidáváme webům novou unikátní funkcionalitu.
                </x-public.services-item>
                <x-public.services-item
                    href="/services/2"
                    title="Úpravy šablon WordPress"
                    img="resources/images/public/services/service-02.jpg"
                    alt="image-2"
                >
                    Upravujeme stávající šablony WordPress cestou vytvoření dceřiné šablony (child theme). Měníme vzhled a rozložení webových stránek.
                </x-public.services-item>
                <x-public.services-item
                    href="/services/3"
                    title="Správa a údržba WordPress webů"
                    img="resources/images/public/services/service-03.jpg"
                    alt="image-3"
                >
                    Správa webů s velkým množstvím pluginů, bezpečné zálohování, opravy a aktualizace webových stránek.
                </x-public.services-item>
                <x-public.services-item
                    href="/services/3"
                    title="Správa a údržba WordPress webů"
                    img="resources/images/public/services/service-03.jpg"
                    alt="image-3"
                >
                    Správa webů s velkým množstvím pluginů, bezpečné zálohování, opravy a aktualizace webových stránek.
                </x-public.services-item>
            </div>
        </div>
    </section>
    <!-- ====== Services Section End -->

</x-public.layouts.base-layout>
