@props([
    'href',
    'type' => 'button',
    'colorClasses',
    'classes' => $colorClasses . ' py-0.5 px-6 transition',
])

@isset($href)
    
    <a 
        href="{{ $href }}" 
        {{ $attributes->merge(['class' => $classes]) }}
    >
        {{ $slot }}
    </a>

@else
    
    <button 
        type="{{ $type }}"
        {{ $attributes->merge(['class' => $classes]) }}
    >
        {{ $slot }}
    </button>

@endisset