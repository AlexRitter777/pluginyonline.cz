@push('head')
    <x-public.json-ld
        type="CollectionPage"
        title="Ceník pluginů"
        description="Orientační ceny vývoje pluginů na míru pro WordPress a WooCommerce."
        :url="request()->fullUrl()"
        :image="url(asset('img/og-default.png'))"
    />

    <x-public.json-ld
        type="BreadcrumbList"
        :breadcrumbs="$breadCrumbs"
    />
@endpush

<x-public.layouts.base-layout
    title="Ceník vývoje pluginů pro WordPress a WooCommerce"
    description="Orientační ceník zakázkového vývoje pluginů pro WordPress a WooCommerce. Ukázky typových řešení a jejich funkcionality."
>

    <x-public.sections.pricing-section/>

</x-public.layouts.base-layout>
