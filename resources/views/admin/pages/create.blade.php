<x-admin.layouts.admin-layout title="Create New Page">

    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            <div
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 mt-4"
            >

                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Create new page
                </h2>

                <form x-data="formValidation" id="pages" @submit.prevent="validate" action="{{route('admin.pages.store')}}" method="post">
                    @csrf
                    <x-admin.input-text
                        type="text"
                        name="title"
                        id="title"
                        validationRules="required|min:3|max:65"
                        placeholder="Enter page title..."
                        value="{{ old('title') }}"
                    >
                        Title
                    </x-admin.input-text>


                    <x-admin.textarea
                        name="description"
                        id="description"
                        validationRules="min:3|max:170"
                        placeholder="Enter meta description..."
                        value="{{ old('description') }}"
                    >
                        Description
                    </x-admin.textarea>

                    <x-admin.input-text
                        type="text"
                        name="route_name"
                        id="route_name"
                        validationRules="required|min:3|max:65"
                        placeholder="Enter route name..."
                        value="{{ old('route_name') }}"
                    >
                        Route name
                    </x-admin.input-text>


                    <x-admin.textarea
                        name="content"
                        id="content"
                        validationRules="summernoteContent"
                        placeholder="Enter some content..."
                        rows="20"
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

                    <x-admin.two-radio
                        name="visible_in_footer"
                        valueFirst="1"
                        valueSecond="0"
                        checkedFirst="checked"
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
                        value="{{ old('position') }}"
                    >
                        Position
                    </x-admin.input-text>

                    <div class="flex mt-10 mb-5 justify-around lg:w-1/2 mx-auto">
                        <x-admin.button-submit>Save</x-admin.button-submit>
                        <x-admin.button-link href="{{route('admin.pages.index')}}">Cancel</x-admin.button-link>

                    </div>

                </form>


            </div>

        </div>
    </main>
</x-admin.layouts.admin-layout>

