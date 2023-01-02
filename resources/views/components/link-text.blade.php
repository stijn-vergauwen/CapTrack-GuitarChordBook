@props(['href', 'text'])

<a class="py-2 px-4 font-bold text-blue-500 hover:text-blue-600 focus:text-blue-600 transition"
    href="{{ $href }}"
>
    {{ $text }}
</a>