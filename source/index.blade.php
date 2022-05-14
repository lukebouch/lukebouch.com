---
pagination: { collection: posts, perPage: 5}
---

@extends('_layouts.main')

@section('body')
    <section class="flex items-center justify-center h-screen -my-5 text-center">
        <div class="container">
            <img class="w-32 mx-auto mb-12 rounded-full shadow-xl u-photo" src="/assets/images/profile.png"
                alt="A photo of Luke Bouch." />
            <h1 class="leading-10">
                Hello 👋<br />
                <span class="text-lg font-normal">my name is
                    <a href="https://lukebouch.com" class="h-card p-name">Luke Bouch</a>.</span>
            </h1>
        </div>
    </section>
    <section class="px-5 container-sm">
        <ol class="space-y-8 divide-y">
            @foreach ($pagination->items as $post)
                <li>
                    <article class="pt-8 h-entry">
                        @if ($post->name)
                            <a class="u-url" href="{{ $post->getUrl() }}">
                                <h2 class="mb-0 p-name">{{ $post->name }}</h2>
                            </a>
                        @endif
                        <div class="e-content post-content">{!! $page->getExcerpt($post->html, 255) !!}</div>

                        <a href="{{ $post->getUrl() }}" class="inline-block mb-2 link">Read more</a>

                        <a class="u-url" href="{{ $post->getUrl() }}">
                            <div>{{ date('g:ia \o\n F j, Y', strtotime($post->date)) }}</div>
                        </a>

                        <div class="hidden dt-published">{{ $post->date }}</div>
                        <a rel="author" class="hidden p-author h-card" href="https://lukebouch.com">Luke Bouch</a>
                    </article>
                </li>
            @endforeach
        </ol>
    </section>
@endsection
