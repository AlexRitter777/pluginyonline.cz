@push('head')
    <x-public.json-ld
        type="CollectionPage"
        title="Portfolio pluginů"
        description="Ukázky pluginů a zakázkových řešení pro WordPress a WooCommerce."
        :breadcrumbs="$breadCrumbs"
        :url="$canonical"
        :image="url(Vite::asset('resources/images/public/og-default.png'))"
    />

    <x-public.json-ld
        type="BreadcrumbList"
        :breadcrumbs="$breadCrumbs"
    />
@endpush

<x-public.layouts.base-layout
    title="Ukázky pluginů a dalších řešení pro WordPress a WooCommerce | Portfolio | PluginyOnline.cz"
    description="Přehled realizovaných pluginů a zakázkových řešení pro WordPress a WooCommerce. Popis účelu, použití a základních funkcí."
    canonical="{{$canonical}}"
>

    <x-public.sections.portfolios-section
        :portfolios="$portfolios"
        :allProjectsUrl="route('portfolio.index')"
        :allProjects="false"
        :pagination="true"

    />

</x-public.layouts.base-layout>
