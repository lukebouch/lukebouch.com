<x-web-layout>
    <div class="p-5 container-sm md:mx-auto">
        <div class="h-entry">
            <h1 class="mb-0 p-name">{{ $post['title'] }}</h1>

            <div>{{ date('g:ia \o\n F j, Y', strtotime($post['published_at'])) }}</div>
            <div class="hidden dt-published">{{ $post['published_at'] }}</div>
            <a rel="author" class="hidden p-author h-card" href="https://lukebouch.com">Luke Bouch</a>

            <div class="mt-5 e-content post-content">
                {!! $post['html_content'] !!}
            </div>
        </div>
    </div>
</x-web-layout>
