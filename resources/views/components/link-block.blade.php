@props(['href', 'text'])

<a class="py-2 px-4 font-bold text-white bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 transition"
    href="{{ $href }}"
>
    {{ $text }}
</a>