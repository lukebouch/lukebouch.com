---
pagination: { collection: posts, perPage: 5}
---

@extends('_layouts.main')

@section('body')
    <section class="container flex items-center">
        <div class="flex-1">
            <h1>Luke Bouch</h1>
            <p>I'm a junior developer at Wilber Group where I aid in the development and maintance of custom business
                applications.</p>
        </div>
        <div class="w-1/3 flex-inital">
            <img src="/assets/images/lukebouch-cutout.png" alt="Luke Bouch">
        </div>
    </section>
    <section class="max-w-6xl py-5 mx-auto text-white rounded-md bg-sky-500">
        <div class="container">
            <h2>Blog</h2>
        </div>
    </section>
@endsection
