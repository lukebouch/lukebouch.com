<a href="{{ $href }}"
    {{ $attributes->class(['text-base font-medium text-white hover:text-indigo-50', 'font-semibold' => $page->isActive($href)]) }}>{{ $slot }}</a>
