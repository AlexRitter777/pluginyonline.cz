<x-admin.layouts.admin-layout title="Services">

    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            <div
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 mt-4"
            >

                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Create new service
                </h2>

                <form action="{{route('admin.services.store')}}" method="post">
                    @csrf
                    <x-admin.input-text
                        name="service_title"
                        id="service_title"
                        required="required"
                        placeholder="Enter service title"
                    >
                        Title
                    </x-admin.input-text>

                    <x-admin.textarea
                        name="service_description"
                        id="service_description"
                        required="required"
                        placeholder="Enter service description"
                    >
                        Description
                    </x-admin.textarea>

                    <x-admin.textarea
                        name="service_content"
                        id="service_content"
                        required="required"
                        placeholder="Enter some content..."
                        rows="8"
                    >
                        Content
                    </x-admin.textarea>

                    <x-admin.two-radio
                        name="service_is_published"
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

                    <x-admin.input-file
                        name="service_thumbnail"
                        accept=".jpg,.png"
                    >
                    Service thumbnail
                    </x-admin.input-file>

                    <div class="flex mt-10 mb-5 justify-around lg:w-1/2 mx-auto">
                        <x-admin.button-regular>Preview</x-admin.button-regular>
                        <x-admin.button-regular>Save</x-admin.button-regular>
                        <x-admin.button-regular>Cancel</x-admin.button-regular>

                    </div>

                </form>


            </div>

        </div>
    </main>
</x-admin.layouts.admin-layout>

