<x-public.layouts.base-layout title="Naše práce">

    <x-public.sections.portfolios-section
        :portfolios="$portfolios"
        :allProjectsUrl="route('portfolio.index')"
        :allProjects="false"
        :pagination="true"
    />

</x-public.layouts.base-layout>
