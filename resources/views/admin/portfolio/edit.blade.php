<x-admin.layouts.admin-layout title="Edit Project | {{ $portfolio->title }}">
    <main class="h-full pb-16 overflow-y-auto">

        <div x-data="modal" class="container px-6 mx-auto grid">

            <div
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 mt-4"
            >

                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Edit project - {{ $portfolio->name }}
                </h2>
                <form x-data="formValidation" id="portfolio" @submit.prevent="validate" action="{{route('admin.portfolio.update', $portfolio)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')
                    {{--Project Title--}}
                    <x-admin.input-text
                        type="text"
                        name="title"
                        id="title"
                        validationRules="required|min:3|max:100"
                        placeholder="Enter project title..."
                        value="{{ old('title', $portfolio->title) }}"
                    >
                        Title
                    </x-admin.input-text>

                    {{--Project Name--}}
                    <x-admin.input-text
                        type="text"
                        name="name"
                        id="name"
                        validationRules="required|min:3|max:65"
                        placeholder="Enter project name..."
                        value="{{ old('name', $portfolio->name) }}"
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
                        value="{{ old('type', $portfolio->type) }}"
                    >
                        Type
                    </x-admin.input-text>

                    {{--Project Purpose--}}
                    <x-admin.input-text
                        type="text"
                        name="purpose"
                        id="purpose"
                        validationRules="required|min:3|max:170"
                        placeholder="Enter project purpose..."
                        value="{{ old('purpose', $portfolio->purpose) }}"
                    >
                        Project Purpose
                    </x-admin.input-text>

                    {{--Project Main Features--}}
                    <x-admin.textarea
                        name="features"
                        id="features"
                        validationRules="required|min:3|max:250"
                        placeholder="Enter project main features..."
                        value="{{ old('features', $portfolio->features) }}"
                    >
                        Project Main Features
                    </x-admin.textarea>

                    {{--Project Requirements--}}
                    <x-admin.textarea
                        name="requirements"
                        id="requirements"
                        validationRules="required|min:3|max:170"
                        placeholder="Enter project requirements..."
                        value="{{ old('requirements', $portfolio->requirements) }}"
                    >
                        Project Requirements
                    </x-admin.textarea>

                    {{--Project Descrtiption--}}
                    <x-admin.textarea
                        name="description"
                        id="description"
                        validationRules="required|min:3|max:250"
                        placeholder="Enter project description..."
                        value="{{ old('description', $portfolio->description) }}"
                    >
                        Project Description
                    </x-admin.textarea>


                    {{--Project Content--}}
                    <x-admin.textarea
                        name="content"
                        id="content"
                        validationRules="summernoteContent"
                        placeholder="Enter project content..."
                        {{--value="{!! !empty(old('content')) ? old('content') : $portfolio->content !!}"--}}
                        value="{!! old('content', $portfolio->content) !!}"
                    >
                        Project Content
                    </x-admin.textarea>

                    {{--Project Status--}}
                    <x-admin.two-radio
                        name="is_published"
                        valueFirst="0"
                        valueSecond="1"
                        checkedFirst="{{ !$portfolio->is_published ? 'checked' : ''}}"
                        checkedSecond="{{ $portfolio->is_published ? 'checked' : ''}}"
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
                        value="{{ old('position', $portfolio->position) }}"
                    >
                        Position
                    </x-admin.input-text>

                    <x-admin.input-file
                        name="thumbnail"
                        accept=".jpg,.png"
                        imageName="{{ basename($portfolio->thumbnail) }}"
                        tempImageUrl="{{ asset($portfolio->thumbnail) }}"
                        oldImage="{{ $portfolio->thumbnail }}"
                    >
                        Project thumbnail
                    </x-admin.input-file>
                    <x-admin.input-gallery
                        :paths="$paths"
                        :images="$images"
                    >
                        Project images gallery
                    </x-admin.input-gallery>


                    <div x-data="{isPreviewOpen: false}" class="relative flex mt-10 mb-5 justify-around lg:w-1/2 mx-auto">
                        <div class="relative flex">
                            <x-admin.button-link
                                clickCondition="@click.stop="
                                clickAction="isPreviewOpen = !isPreviewOpen"
                            >
                                Preview
                            </x-admin.button-link>
                            <template x-if="isPreviewOpen">
                                <ul
                                    @click.outside="isPreviewOpen = !isPreviewOpen"
                                    class="absolute [top:-94px] w-40 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700"
                                >
                                    <li class="flex">
                                        <a
                                            class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                            href="{{ route('admin.portfolio.single', $portfolio->id) }}"
                                        >
                                            <span>Single</span>
                                        </a>
                                    </li>
                                    <li class="flex">
                                        <a
                                            class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                            href="{{ route('admin.portfolio.grid', $portfolio->id) }}"
                                        >
                                            <span>Grid</span>
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </div>
                        <x-admin.button-submit>Save</x-admin.button-submit>
                        <x-admin.cancel-btn-link href="{{route('admin.portfolio.index')}}">Cancel</x-admin.cancel-btn-link>
                        <x-admin.delete-button alpineClick="openModal">Delete</x-admin.delete-button>
                    </div>
                </form>
                <x-admin.modal
                    modalHeader="Delete Confirmation"
                    formAction="{{ route('admin.portfolio.destroy', [$portfolio]) }}"
                >
                    <span>Are you sure you want to delete the project <b>"{{ $portfolio->title }}"</b>?</span>
                </x-admin.modal>
            </div>
        </div>
    </main>
</x-admin.layouts.admin-layout>


