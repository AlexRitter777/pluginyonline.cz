@props(['name' => '', 'id' => '', 'value' => '', 'required' => '', 'placeholder' => 'Enter something...', 'rows' => '3'])

<label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
        {{ $slot }}
    </span>
    <textarea
        name="{{ $name }}"
        id="{{ $id }}"
        {{ $required }}
        placeholder="{{ $placeholder }}"
        rows="{{ $rows }}"
        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea border-gray-300 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md"
    >
    {{ $value }}
    </textarea>
</label>
