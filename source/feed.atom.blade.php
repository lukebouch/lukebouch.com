<rss version="2.0">
    <channel>
        <title>{{ $page->title }}</title>
        <link>{{ $page->baseUrl }}</link>
        <description></description>

        <language>en</language>

        <lastBuildDate></lastBuildDate>

        @foreach ($posts as $post)
            <item>
                <title>{{ $post->name }}</title>
                <link>{{ rightTrimPath($page->baseUrl) }}/{{ $post->getUrl() }}</link>
                <pubDate>{{ $post->date }}</pubDate>

                <guid>{{ rightTrimPath($page->baseUrl) }}/{{ $post->getUrl() }}</guid>
                <description>
                    {{ $post->html }}
                </description>
            </item>
        @endforeach
    </channel>
</rss>
