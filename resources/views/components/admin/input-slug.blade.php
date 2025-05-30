
{{-- Works in combination with slug-manager.js (Alpine component) --}}

@props([
        'name' => '',
        'id' => '',
        'value' => '',
        'required' => '',
        'disabled' => '',
        'validationRules' => '',
        ])


<label
    class="block text-sm  mb-4"
    x-data="slugManager"
>
    <span class="text-gray-700 dark:text-gray-400">
        Slug
    </span>
    <input
        type="text"
        name="{{ $name }}"
        id="{{ $id }}"
        value="{{ $value }}"
        {{ $required }}
        {{ $disabled }}
        data-rules="{{  $validationRules }}"
        data-title="slug"
        placeholder="Leave empty to auto-generate"
        class="block w-full mt-1 mb-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300
 dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md @error($name) custom-invalid @enderror"
        {{--:class="{
            'border-red-500 dark:border-red-400 border-2': errors.{{ $name }}
        }"--}}
    >

    <x-admin.button-link
        clickCondition="@click.stop="
        clickAction="generateSlug"
    >    Generate
    </x-admin.button-link>

{{--    <span--}}
{{--        x-show="errors.{{ $name }}"--}}
{{--        x-text="errors.{{ $name }}"--}}
{{--        class="text-red-600 dark:text-red-400 text-sm mt-1 block"--}}
{{--        :class="{--}}
{{--            'scroll-message': errors.{{ $name }}--}}
{{--        }"--}}
{{--    ></span>--}}
    @error($name)
    <span
        class="text-red-600 dark:text-red-400 text-sm mt-1 block"
    >{{ $message }}
    </span>
    @enderror

</label>
