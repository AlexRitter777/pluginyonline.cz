<x-admin.layouts.admin-layout title="Create New Service">

    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            <div
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 mt-4"
            >

                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Create new service
                </h2>

                <form x-data="formValidation" id="services" @submit.prevent="validate" action="{{route('admin.services.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <x-admin.input-text
                        type="text"
                        name="title"
                        id="title"
                        validationRules="required|min:3|max:65"
                        placeholder="Enter service title..."
                        value="{{ old('title') }}"
                    >
                        Title
                    </x-admin.input-text>

                    <x-admin.textarea
                        name="description"
                        id="description"
                        validationRules="required|min:3|max:170"
                        placeholder="Enter service description..."
                        value="{{ old('description') }}"
                    >
                        Description
                    </x-admin.textarea>

                    <x-admin.textarea
                        name="content"
                        id="content"
                        validationRules="summernoteContent"
                        placeholder="Enter some content..."
                        rows="8"
                        value="{!! old('content') !!}"
                    >
                        Content
                    </x-admin.textarea>

                    <x-admin.two-radio
                        name="is_published"
                        valueFirst="0"
                        valueSecond="1"
                        checkedFirst="checked"
                    >
                        Service status
                        <x-slot:valueTitleFirst>
                            Draft
                        </x-slot>
                        <x-slot:valueTitleSecond>
                            Published
                        </x-slot>
                    </x-admin.two-radio>

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
                    Service thumbnail
                    </x-admin.input-file>

                    <div class="flex mt-10 mb-5 justify-around lg:w-1/2 mx-auto">
                        <x-admin.button-link>Preview</x-admin.button-link>
                        <x-admin.button-submit>Save</x-admin.button-submit>
                        <x-admin.button-link href="{{route('admin.services.index')}}">Cancel</x-admin.button-link>

                    </div>

                </form>


            </div>

        </div>
    </main>
</x-admin.layouts.admin-layout>

