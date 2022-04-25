---
pagination: { collection: posts, perPage: 25}
---

@extends('_layouts.main')

@section('body')
    <section class="h-screen flex justify-center items-center text-center">
        <div class="container">
            <img class="w-32 mx-auto mb-12 shadow-xl rounded-full u-photo" src="/assets/images/profile.png"
                alt="A photo of Luke Bouch." />
            <h1 class="leading-10">
                Hello 👋<br />
                <span class="text-lg font-normal">my name is
                    <a href="https://lukebouch.com" class="h-card p-name">Luke Bouch</a>.</span>
            </h1>
        </div>
    </section>
    <section class="container-sm px-5">
        <ol class="space-y-8 divide-y">
            @foreach ($pagination->items as $post)
                <li class="pt-8">
                    <div class="post-content">{!! $post->html !!}</div>
                </li>
            @endforeach
        </ol>

        <nav class="my-5 border-t border-gray-200 px-4 flex items-center justify-between sm:px-0">
            <div class="-mt-px w-0 flex-1 flex">
                @if ($previous = $pagination->previous)
                    <a href="{{ $page->baseUrl }}{{ $previous }}"
                        class="border-t-2 border-transparent pt-4 pr-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                        <!-- Heroicon name: solid/arrow-narrow-left -->
                        <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
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
                        class=" {{ $pagination->currentPage == $pageNumber? 'border-blue-500 text-vlue-600 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium': 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium' }}">{{ $pageNumber }}</a>
                @endforeach
            </div>
            <div class="-mt-px w-0 flex-1 flex justify-end">
                @if ($next = $pagination->next)
                    <a href="{{ $page->baseUrl }}{{ $next }}"
                        class="border-t-2 border-transparent pt-4 pl-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                        Next
                        <!-- Heroicon name: solid/arrow-narrow-right -->
                        <svg class="ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
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
