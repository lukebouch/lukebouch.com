<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="TODO" rel="alternate" type="application/rss+xml" title="{{ config('web.title') }}">

    <title>{{ config('web.title') }}</title>

    <!-- Fonts -->


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased text-gray-900">
    <x-web.navigation />
    <main class="py-5">
        {{ $slot }}
    </main>

    <footer class="py-10 text-center text-gray-500">
        <a href="/feed.xml">RSS Feed</a>
    </footer>
</body>

</html>
