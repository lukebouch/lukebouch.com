<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ route('feeds.rss') }}" rel="alternate" type="application/rss+xml" title="{{ config('web.title') }}">

    <link rel="me" href="https://github.com/lukebouch">
    <link rel="authorization_endpoint" href="https://indieauth.com/auth">
    <link rel="token_endpoint" href="https://tokens.indieauth.com/token">

    <title>{{ config('web.title') }}</title>

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
