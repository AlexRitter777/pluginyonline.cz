<x-public.layouts.preview-layout :title="$services[0]->title">

    <x-public.sections.services-section
        :services="$services"
        backgroundColor="[#f8f9ff]"
        titleColor="black"
        :preview="true"
    />

</x-public.layouts.preview-layout>
