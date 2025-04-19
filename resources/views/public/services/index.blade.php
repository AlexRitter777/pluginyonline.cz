<x-public.layouts.base-layout title="Naše služby">

    <x-public.sections.services-section
        :backUrl="route('services.index')"
        :services="$services"
        backgroundColor="[#f8f9ff]"
        titleColor="black"
        :allServices="false"
    />

</x-public.layouts.base-layout>
