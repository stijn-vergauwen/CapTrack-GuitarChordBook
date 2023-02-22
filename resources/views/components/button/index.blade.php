@props([
    'href',
    'type' => 'button',
    'colorClasses',
    'spacing' => 'py-2 px-8',
])

@isset($href)
    
    <a 
        href="{{ $href }}" 
        {{ $attributes->merge(['class' => $colorClasses . ' ' . $spacing . ' w-full inline-block transition']) }}
    >
        {{ $slot }}
    </a>

@else
    
    <button 
        type="{{ $type }}"
        {{ $attributes->merge(['class' => $colorClasses . ' ' . $spacing . ' w-full inline-block transition']) }}
    >
        {{ $slot }}
    </button>

@endisset