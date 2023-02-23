<!-- item to display as info, with href to click-through to item -->

@props([
    'href',
    'base' => 'bg-neutral-200 text-primary-600',
    'hover' => 'hover:text-primary-700 focus:text-primary-700',
])
    
<a 
    href="{{ $href }}" 
    {{ $attributes->merge(['class' => $base . ' ' . $hover . ' px-6 py-2 font-bold transition']) }}
>
    {{ $slot }}
</a>