@props(['title', 'canonical' => request()->fullUrl()])

<x-public.layouts.layout :title="$title" :canonical="$canonical">

    <x-public.partitials.header/>

    {{ $slot }}

    <x-public.partitials.footer/>

</x-public.layouts.layout>

