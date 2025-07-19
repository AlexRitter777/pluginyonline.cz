@push('head')
    <x-public.json-ld
        type="CollectionPage"
        title="Služby"
        description="Přehled služeb a vývoje pluginů na míru pro WordPress a WooCommerce."
        :breadcrumbs="$breadCrumbs"
        :url="request()->fullUrl()"
        :image="url(asset('img/og-default.png'))"
    />

    <x-public.json-ld
        type="BreadcrumbList"
        :breadcrumbs="$breadCrumbs"
    />
@endpush

<x-public.layouts.base-layout
    title="Nabídka služeb | Vývoj pluginů pro WordPress a WooCommerce"
    description="Prohlédněte si služby v oblasti vývoje pluginů na míru pro WordPress a WooCommerce. Navrhujeme funkční a udržitelná řešení."
>

    <x-public.sections.services-section
        :backUrl="route('services.index')"
        :services="$services"
        backgroundColor="[#f8f9ff]"
        titleColor="black"
        :allServices="false"
    />

</x-public.layouts.base-layout>
