@props([
    'base' => 'bg-primary-600',
    'hover' => 'hover:bg-primary-700 focus:bg-primary-700',
    'text' => 'text-white',
])

<x-button
    colorClasses=""
    classes="py-1.5 px-7 transition text-center {{ $text }} {{ $base }} {{ $hover }}"
    {{ $attributes }}
>
    {{ $slot }}
</x-button>