<x-web-layout>
    <section class="px-5 py-10 mt-5 text-center container-sm">
        <h1>Blog</h1>
    </section>
    <section class="px-5 container-sm">
        <ol class="space-y-8 divide-y">
            @foreach ($posts as $post)
                <li>
                    <article class="pt-8 h-entry">
                        @if ($post['title'])
                            <a class="u-url" href="{{ route('posts.show', $post['slug']) }}">
                                <h2 class="mb-0 p-name">{{ $post['title'] }}</h2>
                            </a>
                        @endif
                        <div class="e-content post-content">{!! $post['html_content'] !!}</div>

                        <a class="u-url" href="{{ route('posts.show', $post['slug']) }}">
                            <div>{{ date('g:ia \o\n F j, Y', strtotime($post['published_at'])) }}</div>
                        </a>

                        <div class="hidden dt-published">{{ $post['published_at'] }}</div>
                        <a rel="author" class="hidden p-author h-card" href="https://lukebouch.com">Luke Bouch</a>
                    </article>
                </li>
            @endforeach
        </ol>
        <div class="mt-8">{{ $posts->links() }}</div>
    </section>
</x-web-layout>
