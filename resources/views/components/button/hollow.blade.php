@props([
    'base' => 'text-primary-600 border-primary-600',
    'hover' => 'hover:text-primary-700 focus:text-primary-700 hover:border-primary-700 focus:border-primary-700',
])

<x-button
    colorClasses="border-[3px] {{ $base }} {{ $hover }}"
    {{ $attributes }}
>
    {{ $slot }}
</x-button>