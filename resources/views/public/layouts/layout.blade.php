@props(['title' => 'Pluginy Online'])

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="favicon_public.ico" />
    <title>{{ $title }} | Pluginy Wordpress na míru</title>
    @vite(['resources/css/public.css', 'resources/js/public.js'])
</head>
<body>

{{ $slot }}

{{-- Back To Top Start --}}
<a
    href="javascript:void(0)"
    class="hidden items-center justify-center bg-primary text-white w-10 h-10 rounded-md fixed bottom-8 right-8 left-auto z-[999] hover:shadow-signUp transition duration-300 back-to-top"
>
    <span class="w-3 h-3 border-t border-l border-white rotate-45 mt-[6px]"></span>
</a>
{{-- Back To Top End --}}

@stack('scripts')

</body>
</html>
