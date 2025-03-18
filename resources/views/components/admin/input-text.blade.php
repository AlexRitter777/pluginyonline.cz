@props(['name' => '',
        'id' => '',
        'value' => '',
        'autocomplete' => 'on',
        'required' => '',
        'placeholder' => '',
        'validationRules' => ''
        ])


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
        data-rules="{{  $validationRules }}"
        data-title="{{ $slot }}"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300
 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md"
        :class="{
            'border-red-500 dark:border-red-400 border-2': errors.{{ $name }}
        }"
    >
    <span
        x-show="errors.{{ $name }}"
        x-text="errors.{{ $name }}"
        class="text-red-600 dark:text-red-400 text-sm mt-1 block"
    ></span>
</label>
