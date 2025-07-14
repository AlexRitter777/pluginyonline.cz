@push('head')
    <x-public.json-ld
        type="WebPage"
        :title="$page->title"
        :description="$page->description"
        :url="request()->fullUrl()"
    />

    <x-public.json-ld
        type="BreadcrumbList"
        :breadcrumbs="$breadCrumbs"
    />
@endpush


<x-public.layouts.base-layout
    :title="$page->title"
    :description="$page->description"
>

    <x-public.partitials.page-single>
        {!! $page->content !!}
    </x-public.partitials.page-single>

</x-public.layouts.base-layout>
