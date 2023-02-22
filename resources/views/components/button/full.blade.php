@props([
    'base' => 'bg-primary-600',
    'hover' => 'hover:bg-primary-700 focus:bg-primary-700',
    'text' => 'text-white',
])

<x-button
    colorClasses="text-center {{ $text }} {{ $base }} {{ $hover }}"
    {{ $attributes }}
>
    {{ $slot }}
</x-button>