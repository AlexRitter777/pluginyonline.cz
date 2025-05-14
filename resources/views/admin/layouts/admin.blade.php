@props(['title' => 'Pluginy Online Admin'])

<!DOCTYPE html>
<html :class="{ 'dark': dark }"
      x-data="data"
      lang="en"
>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> {{ $title }} </title>
    <script>
        if (
            localStorage.getItem('dark') === 'true' ||
            (!localStorage.getItem('dark') && window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        }
    </script>
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    {{--@stack('head')--}}
</head>

<body>
<div
    class="flex h-screen bg-gray-50 dark:bg-gray-900"
    :class="{ 'overflow-hidden': isSideMenuOpen }"
>
    <!-- Desktop sidebar -->
    <x-admin.partials.sidebar-desktop/>
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <x-admin.partials.sidebar-background/>
    <x-admin.partials.sidebar-mobile/>
    <div class="flex flex-col flex-1 w-full">
        <x-admin.partials.header />
        {{ $slot }}
    </div>
</div>
{{--@stack('scripts')--}}
</body>


</html>
