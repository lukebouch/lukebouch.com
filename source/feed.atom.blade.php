@extends('_layouts.rss')

@section('entries')
    @foreach ($posts as $post)
        <entry>
            <id>{{ rightTrimPath($page->baseUrl) }}/{{ $post->getUrl() }}</id>
            <link type="text/html" rel="alternate" href="" />
            <title>{{ $post->name }}</title>
            <published>{{ $post->date }}</published>
            <updated>{{ $post->updated }}</updated>
            <author>
                <name>{{ $page->siteAuthor }}</name>
            </author>

            <content type="html">
                {{ $post->html }}
            </content>
        </entry>
    @endforeach
@endsection
