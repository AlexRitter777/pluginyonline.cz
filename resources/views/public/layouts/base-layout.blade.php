@props([
    'title' => null,
    'canonical' => null,
    'description' => null,
    ])

<x-public.layouts.layout
    :title="$title"
    :canonical="$canonical"
    :description="$description"
>

    <x-public.partitials.header/>

    {{ $slot }}

    <x-public.partitials.footer/>

</x-public.layouts.layout>

