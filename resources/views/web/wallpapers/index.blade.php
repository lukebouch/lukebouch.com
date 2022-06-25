<x-web-layout>
    <section class="flex items-center justify-center px-4 pb-24 text-center md:pb-40 py-28">
        <h1 class="text-3xl md:text-5xl">Exceptional Wallpaper
            <div class="mt-3 text-xl">for
                <x-icons.phone /> Phone +
                <x-icons.tablet /> Table +
                <x-icons.computer /> Computer
            </div>
        </h1>
    </section>
    <section class="container px-4">
        <ul class="grid gap-10 mb-8 md:grid-cols-3">
            @foreach ($wallpapers as $wallpaper)
                <li class="grid gap-5">
                    <a href="{{ route('wallpapers.download', [$wallpaper]) }}">
                        <div
                            class="block w-full overflow-hidden bg-gray-100 rounded-lg group aspect-w-10 aspect-h-7 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500">
                            <img src="{{ $wallpaper->media('wallpapers')->first()?->getUrl() }}" alt=""
                                class="object-cover pointer-events-none group-hover:opacity-75">
                            <button type="button" class="absolute inset-0 focus:outline-none">
                                <span class="sr-only">View details for IMG_4985.HEIC</span>
                            </button>
                        </div>
                    </a>
                    <h3 class="hidden">{{ $wallpaper->name }}</h3>
                    <a class="mx-auto mt-auto btn"
                        href="{{ route('wallpapers.download', [$wallpaper]) }}">Download</a>

                </li>
            @endforeach
        </ul>
        {{ $wallpapers->links() }}
    </section>
</x-web-layout>
