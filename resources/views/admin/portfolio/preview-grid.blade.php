<x-public.layouts.preview-layout :title="$portfolios[0]->title">


    <x-public.sections.portfolios-section
        :portfolios="$portfolios"
        :allProjectsUrl="route('admin.portfolio.single', $portfolios[0])"
        :allProjects="false"
        :preview="true"
     />


</x-public.layouts.preview-layout>
