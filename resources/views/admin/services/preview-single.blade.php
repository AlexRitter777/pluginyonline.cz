<x-public.layouts.preview-layout :title="$service->title">

    <x-public.partitials.service-single
        :title="$service->title"
        :backUrl="route('admin.services.edit', $service->id)"
        :thumbnail="$service->thumbnail"
    >
        {!! $service->content !!}
    </x-public.partitials.service-single>

</x-public.layouts.preview-layout>
