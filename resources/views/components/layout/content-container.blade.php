@props([
    'spacing' => 'p-6',    
    'class',    
])

<div class="{{ $class ?? '' }} {{ $spacing }} bg-white">
    {{ $slot }}
</div>