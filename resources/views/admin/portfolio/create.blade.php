<x-admin.layouts.admin-layout title="Create New Project">
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            <div
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 mt-4"
            >

                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Create new project
                </h2>

                <form x-data="formValidation" id="portfolio" @submit.prevent="validate" action="{{route('admin.portfolio.store')}}" enctype="multipart/form-data" method="post">
                    @csrf

                    {{--Project Title--}}
                    <x-admin.input-text
                        type="text"
                        name="title"
                        id="title"
                        validationRules="required|min:3|max:65"
                        placeholder="Enter project title..."
                        value="{{ old('title') }}"
                    >
                        Title
                    </x-admin.input-text>

                    {{--Slug--}}


                    <x-admin.input-slug
                        name="slug"
                        id="slug"
{{--                        validationRules="required|min:3|max:65"--}}
{{--                        placeholder="Enter project name..."--}}
                        disabled="disabled"
                        value="{{ old('slug') }}"
                    />


                    {{--Project Name--}}
                    <x-admin.input-text
                        type="text"
                        name="name"
                        id="name"
                        validationRules="required|min:3|max:65"
                        placeholder="Enter project name..."
                        value="{{ old('name') }}"
                    >
                        Name
                    </x-admin.input-text>

                    {{--Project Type--}}
                    <x-admin.input-text
                        type="text"
                        name="type"
                        id="type"
                        validationRules="required|min:3|max:65"
                        placeholder="Enter project type..."
                        value="{{ old('type') }}"
                    >
                        Type
                    </x-admin.input-text>

                    {{--Project Purpose--}}
                    <x-admin.input-text
                        type="text"
                        name="purpose"
                        id="purpose"
                        validationRules="required|min:3|max:65"
                        placeholder="Enter project purpose..."
                        value="{{ old('purpose') }}"
                    >
                        Project Purpose
                    </x-admin.input-text>

                    {{--Project Main Features--}}
                    <x-admin.textarea
                        name="features"
                        id="features"
                        validationRules="required|min:3|max:170"
                        placeholder="Enter project main features..."
                        value="{{ old('features') }}"
                    >
                        Project Main Features
                    </x-admin.textarea>

                    {{--Project Requirements--}}
                    <x-admin.textarea
                        name="requirements"
                        id="requirements"
                        validationRules="required|min:3|max:170"
                        placeholder="Enter project requirements..."
                        value="{{ old('requirements') }}"
                    >
                        Project Requirements
                    </x-admin.textarea>

                    {{--Project Descrtiption--}}
                    <x-admin.textarea
                        name="description"
                        id="description"
                        validationRules="required|min:3|max:170"
                        placeholder="Enter project description..."
                        value="{{ old('description') }}"
                    >
                        Project Description
                    </x-admin.textarea>

                    {{--Project Content--}}
                    <x-admin.textarea
                        name="content"
                        id="content"
                        validationRules="summernoteContent"
                        placeholder="Enter project content..."
                        value="{{ old('content') }}"
                    >
                        Project Content
                    </x-admin.textarea>

                    {{--Project Status--}}
                    <x-admin.two-radio
                        name="is_published"
                        valueFirst="0"
                        valueSecond="1"
                        checkedFirst="checked"
                    >
                        Project status
                        <x-slot:valueTitleFirst>
                            Draft
                        </x-slot>
                        <x-slot:valueTitleSecond>
                            Published
                        </x-slot>
                    </x-admin.two-radio>

                    {{--Project Position--}}
                    <x-admin.input-text
                        type="number"
                        name="position"
                        id="title"
                        validationRules="posInteger"
                        placeholder="Enter position..."
                        value="{{ old('position') }}"
                    >
                        Position
                    </x-admin.input-text>

                    <x-admin.input-file
                        name="thumbnail"
                        accept=".jpg,.png"
                    >
                        Project thumbnail
                    </x-admin.input-file>

                    <x-admin.input-gallery>
                        Project images gallery
                    </x-admin.input-gallery>


                    <div class="flex mt-10 mb-5 justify-around lg:w-1/2 mx-auto">
                        <x-admin.button-link>Preview</x-admin.button-link>
                        <x-admin.button-submit>Save</x-admin.button-submit>
                        <x-admin.button-link href="{{route('admin.portfolio.index')}}">Cancel</x-admin.button-link>

                    </div>

                </form>


            </div>

        </div>
    </main>
</x-admin.layouts.admin-layout>

