<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('web.title') }}</title>

    <link href="{{ route('feeds.rss') }}" rel="alternate" type="application/rss+xml" title="{{ config('web.title') }}">

    <link rel="me" href="https://github.com/lukebouch">
    <link rel="authorization_endpoint" href="https://indieauth.com/auth">
    <link rel="token_endpoint" href="https://tokens.indieauth.com/token">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->


    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="h-full font-sans antialiased text-gray-900 bg-zinc-50">
<div class="h-auto min-h-full max-w-5xl mx-auto bg-white border-l border-r">
    <x-web.navigation/>
    <main class="py-5">
        {{ $slot }}
    </main>

    <footer class="py-10 text-center text-gray-500">
        <a href="/feed.xml">RSS Feed</a>
    </footer>
</div>
</body>

</html>
