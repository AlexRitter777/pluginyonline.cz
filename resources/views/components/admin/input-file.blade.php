@props([
    'name',
    'id' => null,
    'accept' => '',
    'required' => false,
    'imageName' => '',
    'tempImageUrl' => '',
    'oldImage' => ''
])


<div
    x-data="imageUpload()"
    x-init="imageName = '{{ $imageName ?? '' }}';
            tempImageUrl = '{{ $tempImageUrl ?? '' }}';
            oldImage='{{ $oldImage ?? '' }}'"
>
<label class="block text-sm relative mt-4">
    <span class="text-gray-700 dark:text-gray-400">
        {{ $slot }}
    </span>

    <div class="relative mt-1 flex items-center" >

        <input type="hidden" x-model="oldImage" name="old_thumbnail" value="{{ $oldImage }}">

        <label for="{{ $id ?? $name }}" class="absolute inset-y-0 left-0 flex items-center px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-l-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray cursor-pointer">
            Choose file
        </label>

        <input
            type="file"
            name="{{ $name }}"
            id="{{ $id ?? $name }}"
            accept="{{ $accept }}"
            {{ $required ? 'required' : '' }}
            class="hidden"
            x-ref="inputFile"
            @change="handleInputChange"

        >

        <input
            type="text"
            readonly
            class="block w-full pl-32 pr-4 py-2 text-sm border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
            placeholder="No file selected"
            x-model="imageName"

        >
        <a href="" @click.prevent="removeImage" x-show="imageName">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
            </svg>
        </a>
    </div>
</label>

<span x-show="errorMessage" x-text="errorMessage" class="text-xs text-red-600 dark:text-red-400"></span>

    <div x-show="tempImageUrl" class="mt-4">
    <img x-bind:src="tempImageUrl" alt="" width="200" class="mx-auto" >
</div>
@error($name)
<span
    class="text-red-600 dark:text-red-400 text-sm mt-1 block"
>{{ $message }}
    </span>
@enderror

</div>
