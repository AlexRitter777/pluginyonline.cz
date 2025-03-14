@props(['name' => '', 'id' => '', 'value' => '', 'autocomplete' => 'on', 'required' => '', 'placeholder' => ''])

<label class="block text-sm">
    <span class="text-gray-700 dark:text-gray-400">
        {{ $slot }}
    </span>
    <input
        type="text"
        name="{{ $name }}"
        id="{{ $id }}"
        value="{{ $value }}"
        autocomplete="{{ $autocomplete }}"
        {{ $required }}
        placeholder="{{ $placeholder }}"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300
 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
    >
</label>
