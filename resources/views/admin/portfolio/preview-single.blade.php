<x-public.layouts.preview-layout :title="$portfolio->title">

    <x-public.partitials.project-single
        :title="$portfolio->title"
        :description="$portfolio->description"
        :backUrl="route('admin.portfolio.edit', $portfolio->id)"
        :images="$portfolio->images"
        :name="$portfolio->name"
        :type="$portfolio->type"
        :purpose="$portfolio->purpose"
        :features="$portfolio->features"
        :requirements="$portfolio->requirements"
    >
        {!! $portfolio->content !!}
    </x-public.partitials.project-single>

</x-public.layouts.preview-layout>
