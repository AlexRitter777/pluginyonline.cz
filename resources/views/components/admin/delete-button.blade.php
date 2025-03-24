@props(['alpineClick' => ''])

<button class="px-4 py-2 text-sm font-medium leading-5 text-red-600 transition-colors duration-150 bg-red-200 border border-red-300 rounded-lg hover:bg-red-300 focus:outline-none focus:shadow-outline-red dark:bg-red-700 dark:text-red-300 dark:border-red-600 dark:hover:bg-red-600"
    @click.prevent="{{ $alpineClick }}"
>

    {{ $slot }}
</button>
