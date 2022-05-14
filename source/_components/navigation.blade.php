<header class="bg-yellow-500">
    <nav class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8" aria-label="Top">
        <div class="flex items-center justify-center w-full py-6 border-b border-indigo-500 lg:border-none">
            <div class="flex items-center">
                <div class="hidden ml-10 space-x-8 lg:block">
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
