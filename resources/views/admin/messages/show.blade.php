<x-admin.layouts.admin-layout title="Message form {{ $message->name }}">

    <main class="h-full pb-16 overflow-y-auto">
        <div x-data="modal" class="container min-h-96 px-6 mx-auto grid">

            <div
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 mt-4"
            >

                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Message from {{ $message->name }}
                </h2>

                <div class="my-2">
                    <p><b>E-mail:</b>  {{ $message->email}}</p>
                </div>
                <div class="my-2">
                    <p><b>Phone number:</b>  {{ $message->phone}}</p>
                </div>
                <div class="my-2">
                    <p><b>Company:</b>  {{ $message->company ?? '-'}}</p>
                </div>
                <div class="my-4">
                    <p><b>Message:</b></p>
                    <div>
                        {{ $message->message}}
                    </div>
                </div>
                <div class="w-1/2 mt-6 mx-auto flex justify-around items-center">
                    <x-admin.cancel-btn-link href="{{route('admin.messages.index')}}">Back</x-admin.cancel-btn-link>
                    <x-admin.delete-button alpineClick="openModal">Delete</x-admin.delete-button>
                </div>
                <x-admin.modal
                    modalHeader="Delete Confirmation"
                    formAction="{{ route('admin.messages.destroy', [$message]) }}"
                >
                    <h3>Are you sure you want to delete message from <b>"{{ $message->name }}"</b>?</h3>
                </x-admin.modal>
            </div>
        </div>
    </main>


</x-admin.layouts.admin-layout>
