@props(['name' => '',
        'id' => '',
        'value' => '',
        'required' => '',
        'placeholder' => 'Enter something...',
        'rows' => '3',
        'validationRules' => ''
       ])

<label class="block text-sm mb-4">
    <span class="text-gray-700 dark:text-gray-400">
        {{ $slot }}
    </span>
    <textarea
        name="{{ $name }}"
        id="{{ $id }}"
        {{ $required }}
        placeholder="{{ $placeholder }}"
        rows="{{ $rows }}"
        data-rules="{{  $validationRules }}"
        data-title="{{ $slot }}"
        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea border-gray-300 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray rounded-md
        @error($name) custom-invalid @enderror"
        :class="{
            'border-red-500 dark:border-red-400 border-2': errors.{{ $name }}
        }"
    >{{ $value }}</textarea>

    <span
        x-show="errors.{{ $name }}"
        x-text="errors.{{ $name }}"
        class="text-red-600 dark:text-red-400 text-sm mt-1 block"
    ></span>
    @error($name)
    <span
        class="text-red-600 dark:text-red-400 text-sm mt-1 block"
    >{{ $message }}
    </span>
    @enderror

</label>
