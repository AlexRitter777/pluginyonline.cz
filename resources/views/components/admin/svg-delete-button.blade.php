@props(['itemId' => '', 'itemIdRef' => ''])

<button
    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
    @click.stop="deleteItemConfirmation ? closeDeleteItemConfirmation() : deleteItemConfirmation = {{ $itemId }}"
    @keydown.escape="closeDeleteItemConfirmation"
>
    <svg
        class="w-5 h-5"
        aria-hidden="true"
        fill="currentColor"
        viewBox="0 0 20 20"
    >
        <path
            fill-rule="evenodd"
            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
            clip-rule="evenodd"
        ></path>
    </svg>
</button>
    <div
        x-show="deleteItemConfirmation === {{$itemId}}"
        x-cloak
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click.outside="closeDeleteItemConfirmation"
        @keydown.escape="closeDeleteItemConfirmation"
        class="absolute right-16 bottom-4 w-36 font-semibold p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700 "
    >
        <div class="flex justify-around">
             <form method="POST" action="{{ route('admin.services.destroy', ['service' => $itemId]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="hover:underline">Delete</button>
            </form>
            <button @click="deleteItemConfirmation = false" class="hover:underline">Cancel</button>
        </div>
    </div>

