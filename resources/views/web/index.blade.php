<x-web-layout>
    <section class="container flex items-center">
        <div class="flex-1">
            <h1>Luke Bouch</h1>
            <p>I'm a junior developer at Wilber Group where I aid in the development and maintance of custom business
                applications.</p>
        </div>
        <div class="w-1/3 flex-inital">
            <img class=" drop-shadow-md" src="/images/lukebouch-cutout.png" alt="Luke Bouch">
        </div>
    </section>
    <section class="max-w-6xl py-10 mx-auto text-white rounded-md shadow-xl bg-sky-500">
        <div class="container space-y-5">
            <h2>Recent Blog Posts</h2>
            @unless($posts->isEmpty())
                <ol class="grid grid-cols-3 gap-3">
                    @foreach ($posts as $post)
                        <li class="space-y-2">
                            @isset($page->title)
                                <h3>{{ $page['title'] }}</h3>
                            @endisset
                            <div class="line-clamp-5">
                                {!! strip_tags(Illuminate\Mail\Markdown::parse($post['content'] ?? '')->toHtml()) !!}
                            </div>
                            <a class="inline-block font-semibold border-b-2 border-white" href="">Read</a>
                        </li>
                    @endforeach
                </ol>
            @endunless
        </div>
    </section>
</x-web-layout>
