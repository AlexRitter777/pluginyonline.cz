<!DOCTYPE html>
<html lang="cs">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pronajemonline.cz</title>
    <link rel="shortcut icon" href="images/favicon.png" />
    <script src="https://www.google.com/recaptcha/api.js?render=6LflMpQgAAAAAMN2q092nkMkkOCUicv4D60lxZc9"></script>

    @vite(['resources/js/app.js', 'resources/css/app.css'])

</head>

<body>

    <div class="container-scroller">

    @include('layouts.navbar')

    <div class="container-fluid page-body-wrapper">

        @include('layouts.sidebar')

        <div class="main-panel">
            <div class="content-wrapper">
                @yield('dashboard')
            </div>

            @include('layouts.footer')

        </div>

    </div>

</div>
</body>

</html>

