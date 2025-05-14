@props(['title' => 'Pluginy Online Login'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> {{ $title }} </title>
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
</head>

<body>

    <div class="flex items-center min-h-screen p-6 bg-gray-50">

        {{ $slot }}

    </div>


</body>


</html>
