<header>
    <nav class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8" aria-label="Top">
        <div class="items-center justify-center hidden w-full py-6 lg:flex">
            <div class="flex items-center">
                <div class="space-x-8">
                    <x-web.navigation.desktop-link href="/">Home</x-web.navigation.desktop-link>
                    <x-web.navigation.desktop-link route="posts.index">Blog</x-web.navigation.desktop-link>
                    <x-web.navigation.desktop-link route="wallpapers.index">Wallpaper</x-web.navigation.desktop-link>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap justify-center py-4 space-x-6 lg:hidden">
            <x-web.navigation.mobile-link href="/">Home</x-web.navigation.mobile-link>
            <x-web.navigation.mobile-link route="posts.index">Blog</x-web.navigation.mobile-link>
            <x-web.navigation.mobile-link route="wallpapers.index">Wallpaper</x-web.navigation.mobile-link>
        </div>
    </nav>
</header>
