---
site_path: feed.rss
---

@extends('_layouts.rss')

@section('entries')
    @foreach ($posts as $entry)
        <x-rss.entry :entry="$entry" />
    @endforeach
@endsection
