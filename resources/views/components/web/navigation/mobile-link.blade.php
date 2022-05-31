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
    {{ $attributes->class(['text-base font-medium hover:text-indigo-50', 'font-semibold' => $isActive]) }}>
    {{ $slot }}
</a>
