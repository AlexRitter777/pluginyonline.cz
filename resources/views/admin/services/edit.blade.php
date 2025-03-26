<x-admin.layouts.admin-layout title="Edit | {{ $service->title }} ">

    <main class="h-full pb-16 overflow-y-auto">
        <div x-data="modal" class="container px-6 mx-auto grid">

            <div
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 mt-4"
            >

                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Edit service - {{ $service->title }}
                </h2>

                <form x-data="formValidation" id="services" @submit.prevent="validate" action="{{route('admin.services.update', $service)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')
                    <x-admin.input-text
                        type="text"
                        name="title"
                        id="title"
                        validationRules="required|min:3|max:65"
                        placeholder="Enter service title..."
                        value="{{ $service->title }}"
                    >
                        Title
                    </x-admin.input-text>

                    <x-admin.textarea
                        name="description"
                        id="description"
                        validationRules="required|min:3|max:170"
                        placeholder="Enter service description..."
                        value="{{ $service->description }}"
                    >
                        Description
                    </x-admin.textarea>

                    <x-admin.input-text
                        type="text"
                        name="slug"
                        id="slug"
                        validationRules=""
                        placeholder=""
                        value="{{ $service->slug }}"
                        disabled="disabled"
                    >
                        Slug
                    </x-admin.input-text>

                    <x-admin.textarea
                        name="content"
                        id="content"
                        placeholder="Enter some content..."
                        rows="8"
                        value="{!! $service->content !!}"
                    >
                        Content
                    </x-admin.textarea>

                    <x-admin.two-radio
                        name="is_published"
                        valueFirst="0"
                        valueSecond="1"
                        checkedFirst="{{ !$service->is_published ? 'checked' : ''}}"
                        checkedSecond="{{ $service->is_published ? 'checked' : ''}}"

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
                        value="{{  $service->position }}"
                    >
                        Position
                    </x-admin.input-text>

                    <x-admin.input-file
                        name="thumbnail"
                        accept=".jpg,.png"
                        imageName="{{ basename($service->thumbnail) }}"
                        tempImageUrl="{{ asset($service->thumbnail) }}"
                        oldImage="{{ $service->thumbnail }}"
                    >
                        Service thumbnail
                    </x-admin.input-file>

                    <div x-data="{isPreviewOpen: false}" class="relative flex mt-10 mb-5 justify-around lg:w-1/2 mx-auto">
                        <x-admin.button-link
                            clickCondition="@click.stop"
                            clickAction="isPreviewOpen = !isPreviewOpen"
                        >
                            Preview
                        </x-admin.button-link>
                        <template x-if="isPreviewOpen">
                            <ul
                                @click.outside="isPreviewOpen = !isPreviewOpen"
                                class="absolute [right:204px] [top:-94px] w-40 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700"
                            >
                                <li class="flex">
                                    <a
                                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                        href="{{ route('admin.services.single', $service->slug) }}"
                                    >
                                        <span>Single</span>
                                    </a>
                                </li>
                                <li class="flex">
                                    <a
                                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                        href="{{ route('admin.services.grid', $service->slug) }}"
                                    >
                                        <span>Grid</span>
                                    </a>
                                </li>
                            </ul>
                        </template>
                        <x-admin.button-submit>Save</x-admin.button-submit>
                        <x-admin.cancel-btn-link href="{{route('admin.services.index')}}">Cancel</x-admin.cancel-btn-link>
                        <x-admin.delete-button alpineClick="openModal">Delete</x-admin.delete-button>
                    </div>
                </form>
            </div>
            <x-admin.modal
                modalHeader="Delete Confirmation"
                formAction="{{ route('admin.services.destroy', [$service]) }}"
            >
                <h3>Are you sure you want to delete the service <b>"{{ $service->title }}"</b>?</h3>
            </x-admin.modal>
        </div>
    </main>

</x-admin.layouts.admin-layout>
