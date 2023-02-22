@props([
    'href',
    'class' => 'border-primary-600',
])

<a class="{{ $class }} w-full h-full inline-block p-6 bg-white border-2 border-opacity-0 hover:border-opacity-100 focus:border-opacity-100 transition" href="{{ $href }}">
    {{ $slot }}
</a>