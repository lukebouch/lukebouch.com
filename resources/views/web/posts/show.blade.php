<x-web-layout>
    <div class="p-5 container-sm md:mx-auto">
        <div class="h-entry">
            <h1 class="mb-1 p-name">{{ $post->title }}</h1>
            <a class="hidden u-url" href="{{ route('posts.show', $post->slug) }}"></a>

            <div>
                {{ $post->published_at->setTimezone('America/New_York')->format('g:ia \o\n F j, Y') }}
            </div>
            <div class="hidden dt-published">{{ $post->published_at }}</div>
            <a rel="author" class="hidden p-author h-card" href="https://lukebouch.com">Luke Bouch</a>

            <div class="mt-5 e-content post-content">
                {!! $post->html !!}
            </div>
        </div>
        <div class="mt-8">
            <a href="{{ route('posts.index') }}"
                class="flex items-center justify-center gap-3 text-gray-900 dark:text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Posts
            </a>
        </div>
    </div>
</x-web-layout>
