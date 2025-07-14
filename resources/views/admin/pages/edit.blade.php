<x-admin.layouts.admin-layout title="Edit page - {{$page->title}}">

    <main class="h-full pb-16 overflow-y-auto">
        <div x-data="modal" class="container px-6 mx-auto grid">

            <div
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 mt-4"
            >

                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Edit page - {{ $page->title }}
                </h2>

                <form x-data="formValidation" id="pages" @submit.prevent="validate" action="{{route('admin.pages.update', $page)}}" method="post">
                    @csrf
                    @method('PUT')
                    <x-admin.input-text
                        type="text"
                        name="title"
                        id="title"
                        validationRules="required|min:3|max:65"
                        placeholder="Enter page title..."
                        value="{{ old('title', $page->title) }}"
                    >
                        Title
                    </x-admin.input-text>

                    <x-admin.textarea
                        name="description"
                        id="description"
                        validationRules="min:3|max:170"
                        placeholder="Enter meta description..."
                        value="{{ old('description', $page->description) }}"
                    >
                        Description
                    </x-admin.textarea>

                    <x-admin.input-text
                        type="text"
                        name="route_name"
                        id="route_name"
                        validationRules="min:1|max:65"
                        placeholder="Enter route name..."
                        value="{{ old('route_name', $page->route_name) }}"
                    >
                        Route name
                    </x-admin.input-text>

                    <x-admin.input-text
                        type="text"
                        name="slug"
                        id="slug"
                        validationRules=""
                        placeholder=""
                        value="{{ $page->slug }}"
                        disabled="disabled"
                    >
                        Slug
                    </x-admin.input-text>

                    <x-admin.textarea
                        name="content"
                        id="content"
                        validationRules="summernoteContent"
                        placeholder="Enter some content..."
                        rows="20"
                        value="{!! old('content', $page->content) !!}"
                    >
                        Content
                    </x-admin.textarea>

                    <x-admin.two-radio
                        name="is_published"
                        valueFirst="0"
                        valueSecond="1"
                        checkedFirst="{{ !$page->is_published ? 'checked' : ''}}"
                        checkedSecond="{{ $page->is_published ? 'checked' : ''}}"
                    >
                        Service status
                        <x-slot:valueTitleFirst>
                            Draft
                        </x-slot>
                        <x-slot:valueTitleSecond>
                            Published
                        </x-slot>
                    </x-admin.two-radio>

                    <x-admin.two-radio
                        name="visible_in_footer"
                        valueFirst="1"
                        valueSecond="0"
                        checkedFirst="{{ $page->visible_in_footer ? 'checked' : ''}}"
                        checkedSecond="{{ !$page->visible_in_footer ? 'checked' : ''}}"
                    >
                        Show in footer
                        <x-slot:valueTitleFirst>
                            Yes
                        </x-slot>
                        <x-slot:valueTitleSecond>
                            No
                        </x-slot>
                    </x-admin.two-radio>

                    <x-admin.input-text
                        type="number"
                        name="position"
                        id="title"
                        validationRules="posInteger"
                        placeholder="Enter position..."
                        value="{{ old('position', $page->position) }}"
                    >
                        Position
                    </x-admin.input-text>

                    <div class="relative flex mt-10 mb-5 justify-around lg:w-1/2 mx-auto">
                        <div class="relative flex">
                            <x-admin.button-link
                                href="{{route('admin.pages.show', $page->slug)}}"
                            >
                                Preview
                            </x-admin.button-link>

                        </div>
                        <x-admin.button-submit>Save</x-admin.button-submit>
                        <x-admin.cancel-btn-link href="{{route('admin.pages.index')}}">Cancel</x-admin.cancel-btn-link>
                        <x-admin.delete-button alpineClick="openModal">Delete</x-admin.delete-button>
                    </div>

                </form>
            </div>
            <x-admin.modal
                modalHeader="Delete Confirmation"
                formAction="{{ route('admin.pages.destroy', [$page]) }}"
            >
                <h3>Are you sure you want to delete the page <b>"{{ $page->title }}"</b>?</h3>
            </x-admin.modal>

        </div>
    </main>
</x-admin.layouts.admin-layout>


