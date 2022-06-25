@props([
    'route' => null,
    'href' => '#',
])

@php
if ($route) {
    $href = route($route);
    $isActive = str()
        ->of(Route::currentRouteName())
        ->contains($route);
} else {
    $isActive = request()->is($href);
}
@endphp

<a href="{{ $href }}"
    {{ $attributes->class(['text-base font-medium light:hover:text-gray-700 hover:dark:text-gray-400', 'font-semibold' => $isActive]) }}>
    {{ $slot }}
</a>
