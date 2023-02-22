@props([
    'base' => 'bg-white border-l-4 border-neutral-300',
    'hover' => 'hover:border-primary-600 focus:border-primary-600',
    'text' => 'text-primary-600',
])

<x-button
    colorClasses="text-center {{ $base }} {{ $hover }} {{ $text }}"
    spacing="py-4 px-8"
    {{ $attributes }}
>
    {{ $slot }}
</x-button>