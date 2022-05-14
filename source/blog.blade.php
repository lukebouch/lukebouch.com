---
pagination: { collection: posts, perPage: 25}
---

@extends('_layouts.main')

@section('body')
    <section class="px-5 py-10 mt-5 text-center container-sm">
        <h1>Blog</h1>
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
                        <div class="e-content post-content">{!! $post->html !!}</div>

                        <a class="u-url" href="{{ $post->getUrl() }}">
                            <div>{{ date('g:ia \o\n F j, Y', strtotime($post->date)) }}</div>
                        </a>

                        <div class="hidden dt-published">{{ $post->date }}</div>
                        <a rel="author" class="hidden p-author h-card" href="https://lukebouch.com">Luke Bouch</a>
                    </article>
                </li>
            @endforeach
        </ol>

        <nav class="flex items-center justify-between px-4 my-5 border-t border-gray-200 sm:px-0">
            <div class="flex flex-1 w-0 -mt-px">
                @if ($previous = $pagination->previous)
                    <a href="{{ $page->baseUrl }}{{ $previous }}"
                        class="inline-flex items-center pt-4 pr-1 text-sm font-medium text-gray-500 border-t-2 border-transparent hover:text-gray-700 hover:border-gray-300">
                        <!-- Heroicon name: solid/arrow-narrow-left -->
                        <svg class="w-5 h-5 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        Previous
                    </a>
                @endif
            </div>
            <div class="hidden md:-mt-px md:flex">
                @foreach ($pagination->pages as $pageNumber => $path)
                    <a href="{{ $page->baseUrl }}{{ $path }}"
                        class=" {{ $pagination->currentPage == $pageNumber ? 'border-blue-500 text-vlue-600 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium' }}">{{ $pageNumber }}</a>
                @endforeach
            </div>
            <div class="flex justify-end flex-1 w-0 -mt-px">
                @if ($next = $pagination->next)
                    <a href="{{ $page->baseUrl }}{{ $next }}"
                        class="inline-flex items-center pt-4 pl-1 text-sm font-medium text-gray-500 border-t-2 border-transparent hover:text-gray-700 hover:border-gray-300">
                        Next
                        <!-- Heroicon name: solid/arrow-narrow-right -->
                        <svg class="w-5 h-5 ml-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif
            </div>
        </nav>
    </section>
@endsection
