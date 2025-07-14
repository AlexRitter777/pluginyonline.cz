@push('head')

    <x-public.json-ld
        type="Service"
        :title="$service->title"
        :description="$service->description"
        :url="request()->fullUrl()"
        :image="url($service->thumbnail)"
    />

    <x-public.json-ld
        type="BreadcrumbList"
        :breadcrumbs="$breadCrumbs"
    />

@endpush
<x-public.layouts.base-layout
    :title="$service->title"
    :description="$service->description"
>

    <x-public.partitials.service-single
        :title="$service->title"
        :backUrl="route('services.index')"
        :thumbnail="$service->thumbnail"
    >
        {!! $service->content !!}
    </x-public.partitials.service-single>

</x-public.layouts.base-layout>
