<rss version="2.0">
    <channel>
        <title>{{ config('web.title') }}</title>
        <link>{{ config('app.url') }}</link>
        <description></description>

        <language>en</language>

        <lastBuildDate>{{ now()->format(DateTime::RFC822) }}</lastBuildDate>

        @foreach ($posts as $post)
            <item>
                @php
                    $published_at = new DateTime($post['published_at']);
                @endphp

                <title>{{ $post['title'] }}</title>
                <link>TODO</link>
                <pubDate>{{ $published_at->format(DateTime::RFC822) }}</pubDate>

                <guid>TODO</guid>
                <description>
                    {!! $post['html_content'] !!}
                </description>
            </item>
        @endforeach
    </channel>
</rss>
