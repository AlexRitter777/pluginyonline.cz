@push('head')

    <x-public.json-ld
        type="SoftwareApplication"
        :title="$portfolio->name"
        :description="$portfolio->purpose"
        :url="request()->fullUrl()"
        :image="url($portfolio->thumbnail)"
    />

    <x-public.json-ld
        type="BreadcrumbList"
        :breadcrumbs="$breadCrumbs"
    />

@endpush


<x-public.layouts.base-layout
    :title="$portfolio->title"
    :description="$portfolio->description"
>

    <x-public.partitials.project-single
        :title="$portfolio->title"
        :description="$portfolio->description"
        :backUrl="route('portfolio.index')"
        :images="$portfolio->images"
        :name="$portfolio->name"
        :type="$portfolio->type"
        :purpose="$portfolio->purpose"
        :features="$portfolio->features"
        :requirements="$portfolio->requirements"
    >
        {!! $portfolio->content !!}
    </x-public.partitials.project-single>


</x-public.layouts.base-layout>
