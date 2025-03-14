@props(['name' => '', 'valueFirst' => '',  'valueSecond' => '', 'checkedFirst' => '', 'checkedSecond'=>''])

<div class="mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                          {{ $slot }}
                        </span>
    <div class="mt-2">
        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
            <input type="radio"
                   class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                   name="{{ $name }}" value="{{ $valueFirst }}"
                   {{ $checkedFirst }}
            >

            <span class="ml-2">{{ $valueTitleFirst }}</span>
        </label>
        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
            <input type="radio"
                   class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                   name="{{ $name }}" value="{{ $valueSecond }}"
                   {{ $checkedSecond }}
            >

            <span class="ml-2">{{ $valueTitleSecond }}</span>
        </label>
    </div>
</div>
