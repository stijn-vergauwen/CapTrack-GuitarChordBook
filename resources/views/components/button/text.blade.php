@props([
    'base' => 'text-primary-600',
    'hover' => 'hover:text-primary-700 focus:text-primary-700',
])

<x-button
    colorClasses="{{ $base }} {{ $hover }}"
    {{ $attributes }}
>
    {{ $slot }}
</x-button>