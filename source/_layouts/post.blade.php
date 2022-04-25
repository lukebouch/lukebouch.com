@extends('_layouts.main')

@section('body')
    <div class="container-sm p-5 md:mx-auto">
        <div class="h-entry">
            <h1 class="p-name mb-0">{{ $page->name }}</h1>

            <div>{{ date('g:ia \o\n F j, Y', strtotime($page->date)) }}</div>
            <div class="dt-published hidden">{{ $page->date }}</div>
            <a rel="author" class="p-author h-card hidden" href="https://lukebouch.com">Luke Bouch</a>

            <div class="e-content mt-5">
                @yield('content')
                {!! $page->html !!}
            </div>
        </div>
    </div>
@endsection
