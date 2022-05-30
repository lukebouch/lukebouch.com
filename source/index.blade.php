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
@endsection
