---
pagination: { collection: posts, perPage: 5}
---

@extends('_layouts.main')

@section('body')
    <section class="flex items-center justify-center h-screen -my-5 text-center">
        <div class="container">
            <img class="w-32 mx-auto mb-12 rounded-full shadow-xl u-photo" src="/assets/images/profile.png"
                 alt="A photo of Luke Bouch."/>
            <h1 class="leading-10">
                Hello 👋<br/>
                <span class="text-lg font-normal">my name is
                    <a href="https://lukebouch.com" class="h-card p-name">Luke Bouch</a>.</span>
            </h1>
        </div>
    </section>
    <section class="container-sm">
        <div class="bg-white pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
            <div class="relative max-w-lg mx-auto divide-y-2 divide-gray-200 lg:max-w-7xl">
                <div>
                    <h2>Recent Posts</h2>
                </div>
                <div class="mt-6 pt-10 grid gap-16 lg:grid-cols-2 lg:gap-x-5 lg:gap-y-12">
                    @foreach ($pagination->items as $post)
                        <article class="h-entry">
                            <p class="text-sm text-gray-500">
                                <time datetime="2020-03-16">{{ date('g:ia \o\n F j, Y', strtotime($post->date)) }}</time>
                            </p>
                            <a href="{{ $post->getUrl() }}" class="u-url mt-2 block">
                                @if ($post->name)
                                    <p class="text-xl font-semibold text-gray-900 ">{{ $post->name }}</p>
                                @endif
                                <div class="mt-3 text-base text-gray-500 e-content post-content">{!! $page->getExcerpt($post->html, 255) !!}</div>
                            </a>
                            <div class="mt-3">
                                <a href="#" class="text-base font-semibold text-yellow-600 hover:text-yellow-500"> Read
                                    Post</a>
                            </div>
                            <div class="hidden dt-published">{{ $post->date }}</div>
                            <a rel="author" class="hidden p-author h-card" href="https://lukebouch.com">Luke Bouch</a>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="px-5 container-sm">
        <ol class="space-y-8 divide-y">
            <li>
                <article class="pt-8 h-entry">

                </article>
            </li>
        </ol>
    </section>
@endsection
