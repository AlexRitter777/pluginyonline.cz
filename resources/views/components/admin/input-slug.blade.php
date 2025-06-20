
{{-- Works in combination with slug-manager.js component) --}}
{{-- Compatible with the form-validation.js component --}}

@props([
        'name' => '',
        'id' => '',
        'value' => '',
        'oldValue' =>'',
        'validationRules' => '',
        'isEditForm' => false,
        ])

<label
    class="block text-sm  mb-4"
    x-data="slugManager('{{ $value }}', {{ $errors->any() ? 'true' : 'false' }}, {{ $isEditForm }})"
>
    <span class="text-gray-700 dark:text-gray-400">
        Slug
    </span>
    <div class="flex">
        <input
            name="slug_validation"
            x-model="slug"
            x-ref="slug"
            type="text"
            :id="{{ $id }}"
            :disabled="is_disabled"
            data-rules="{{  $validationRules }}"
            data-title="Slug"
            placeholder="Print title first..."
            class="block w-full mt-1  text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple border-gray-300
     dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-md @error($name) custom-invalid @enderror"
            {{--Error border for form-validation.js component--}}
            :class="{
                'border-red-500 dark:border-red-400 border-2': errors.slug_validation
            }"
        >
        <input type="hidden" name="old_slug" x-ref="old_slug" value="{{ $oldValue }}">
        <input type="hidden" name="{{ $name }}" x-model="slug" >
        <div class="flex" x-show="is_generated">
            <div class="mt-3 ml-1">
                <x-admin.svg-edit-alpine
                    @click.prevent="changeSlug"
                />
            </div>
        </div>
    </div>
    <div class="mt-1">
        <span x-show="error_message" x-text="error_message" class="text-sm text-red-600 dark:text-red-400"></span>
    </div>
    <div class="mt-1">
        <span x-show="success_message" x-text="success_message" class="text-sm text-green-600 dark:text-green-400"></span>
    </div>
    <div class="mt-4 mb-3" x-show="is_editing || is_editing_from_db">
        <template x-if="is_editing || is_editing_from_db">
            <x-admin.button-link
                class="mr-3"
                clickCondition="@click.stop="
                clickAction="checkSlug"
            >    Check
            </x-admin.button-link>
        </template>
        <template x-if="is_editing">
            <x-admin.button-link
                clickCondition="@click.stop="
                clickAction="generateSlug"
            >    Generate
            </x-admin.button-link>
        </template>
        <template x-if="is_editing_from_db">
            <x-admin.button-link
                clickCondition="@click.stop="
                clickAction="resetSlug"
            >    Reset
            </x-admin.button-link>
        </template>
    </div>

    {{--Errors from form-validation.js component--}}
    <span
        x-show="errors.slug_validation"
        x-text="errors.slug_validation"
        class="text-red-600 dark:text-red-400 text-sm mt-1 block"
        :class="{
            'scroll-message': errors.slug_validation
        }"
    ></span>
    {{--End Errors from form-validation.js component--}}

    {{--  Error from backend  --}}
    @error($name)
    <span
        class="text-red-600 dark:text-red-400 text-sm mt-1 block"
    >{{ $message }}
    </span>
    @enderror
    {{--  End Error from backend  --}}

</label>
