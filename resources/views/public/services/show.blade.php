
<x-public.layouts.base-layout title="{{ $service->title }}">

    <x-public.partitials.service-single
        :title="$service->title"
        :backUrl="route('services.index')"
        :thumbnail="$service->thumbnail"
    >
        {!! $service->content !!}
    </x-public.partitials.service-single>

</x-public.layouts.base-layout>
