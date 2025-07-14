@push('head')
    <x-public.json-ld
        type="AboutPage"
        title="O nás"
        description="Zaměřujeme se na vývoj vlastních pluginů pro WordPress. Dáváme přednost samostatným řešením bez zásahů do jádra."
        :url="request()->fullUrl()"
    />

    <x-public.json-ld
        type="BreadcrumbList"
        :breadcrumbs="$breadCrumbs"
    />
@endpush

<x-public.layouts.base-layout
    title="O nás | Vývoj pluginů pro WordPress na zakázku"
    description="Zaměřujeme se na vývoj vlastních pluginů pro WordPress. Dáváme přednost samostatným řešením bez zásahů do jádra. Nabízíme podporu i údržbu."
>

    <x-public.sections.about-section/>

</x-public.layouts.base-layout>
