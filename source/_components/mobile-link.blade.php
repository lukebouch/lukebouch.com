<a href="{{ $href }}"
    {{ $attributes->class(['text-base font-medium hover:text-indigo-50', 'font-semibold' => $page->isActive($href)]) }}>{{ $slot }}</a>
