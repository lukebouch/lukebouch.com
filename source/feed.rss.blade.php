---
site_path: feed.rss
---

@extends('_layouts.rss')

@section('entries')
    @foreach ($posts as $post)
        <entry>
            <id>{{ $post->id }}</id>
            <link type="text/html" rel="alternate" href="" />
            <title>{{ $post->title }}</title>
            <published>{{ $post->date }}</published>
            <updated></updated>
            <author>
                <name>Luke Bouch</name>
            </author>

            <content type="html">
                {{ $post->html }}
            </content>
        </entry>
    @endforeach
@endsection
