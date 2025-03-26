@props(['title'])

<x-public.layouts.layout title="Preview - {{$title}}">

    <x-public.partitials.preview-header/>

    {{ $slot }}

    <x-public.partitials.preview-footer/>

</x-public.layouts.layout>
