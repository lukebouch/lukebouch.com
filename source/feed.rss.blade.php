<rss version="2.0">
    <channel>
        <title>{{ $page->title }}</title>
        <link>{{ $page->baseUrl }}</link>
        <description></description>

        <language>en</language>

        <lastBuildDate>{{ date(DateTime::RFC822) }}</lastBuildDate>

        @foreach ($posts as $post)
            <item>
                @php
                    $date = new DateTime($post->date);
                @endphp

                <title>{{ $post->name }}</title>
                <link>{{ rightTrimPath($page->baseUrl) }}/{{ $post->getUrl() }}</link>
                <pubDate>{{ $date->format(DateTime::RFC822) }}</pubDate>

                <guid>{{ rightTrimPath($page->baseUrl) }}/{{ $post->getUrl() }}</guid>
                <description>
                    {{ $post->html }}
                </description>
            </item>
        @endforeach
    </channel>
</rss>
