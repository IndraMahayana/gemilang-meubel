<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gemilang Meubel')</title>
    <link rel="icon" href="{{ asset('images/gemilanglogo.png') }}" type="image/png">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    @stack('styles')
</head>

<body class="bg-gray-50">

    @include('partials.navbar')

    <main class="min-h-screen">
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>

</html>
