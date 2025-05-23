
@props([
    'title' => '',
    'count' => '',
    'bgColorLight' => '',
    'iconColorLight' => '',
    'bgColorDark' => '',
    'iconColorDark'=> ''
])


<div
    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
>
    <div
        class="p-3 mr-4 {{ $iconColorLight }} {{ $bgColorLight }} rounded-full dark:{{ $iconColorDark }} dark:{{ $bgColorDark }}"
    >

        {{ $slot }}

    </div>
    <div>
        <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
        >
            {{ $title }}
        </p>
        <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
        >
            {{ $count }}
        </p>
    </div>
</div>
