<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin @yield('page-title', 'DC Comics')</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/js/app.js')

</head>

<body>
    <h1 class="text-danger">
        ADMIN
    </h1>
    <!-- header -->
    @include('layout.partials.header')

    <main class="min-vh-100">
        @yield('content')
    </main>

    <!-- footer -->
    @include('layout.partials.footer')

</body>

</html>