<header>
    <nav class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8" aria-label="Top">
        <div class="items-center justify-center hidden w-full py-6 lg:flex">
            <div class="flex items-center">
                <div class="ml-10 space-x-8">
                    <x-desktop-link href="/" :page="$page">Home</x-desktop-link>
                    <x-desktop-link href="/blog" :page="$page">Blog</x-desktop-link>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap justify-center py-4 space-x-6 lg:hidden">
            <x-mobile-link href="/" :page="$page">Home</x-mobile-link>
            <x-mobile-link href="/blog" :page="$page">Blog</x-mobile-link>
        </div>
    </nav>
</header>
