@props(['title'])

<x-public.layouts.layout :title="$title">

    <x-public.partitials.header/>

    {{ $slot }}

    <x-public.partitials.footer/>

</x-public.layouts.layout>

