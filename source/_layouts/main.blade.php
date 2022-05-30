<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="{{ $page->getUrl() }}">
    <meta name="description" content="{{ $page->description }}">
    <link href="{{ $page->baseUrl }}/feed.xml" rel="alternate" type="application/rss+xml"
        title="{{ $page->title }}">

    <title>{{ $page->title }}</title>
    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
    <script defer src="{{ mix('js/main.js', 'assets/build') }}"></script>
</head>

<body class="font-sans antialiased text-gray-900">
    <x-navigation :page="$page" />
    <main class="py-5">
        @yield('body')
    </main>
</body>

<footer class="py-10 text-center text-gray-500">
    <a href="/feed.xml">RSS Feed</a>
</footer>

</html>
