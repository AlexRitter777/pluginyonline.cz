@props([
    'type' => 'text',
    'name' => '',
    'id' => $name,
    'placeholder' => 'Type here...',
    'validationRules' => ''
])

<div class="w-full md:w-1/2 px-4">
    <div class="mb-6">
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            data-rules="{{  $validationRules }}"
            class="input-field"
            x-model="formData.{{ $name }}"
            :disabled="isBusy"
            :class="{
            'border-red-500': errors.{{ $name }}
        }"
        />
        <span
            x-show="errors.{{ $name }}"
            x-text="errors.{{ $name }}"
            class="text-red-600 dark:text-red-400 text-sm mt-1 block"
        ></span>
    </div>
</div>
