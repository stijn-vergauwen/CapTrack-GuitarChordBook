@props(['id', 'title', 'description', 'chords'])

<div class="p-4">
    <a class="w-full h-full px-6 py-4 flex justify-between items-center bg-white border-2 border-opacity-0 border-blue-500 hover:border-opacity-100 transition"
        href="{{ route('songInfo', ['id' => $id]) }}"
    >
        <div class="flex flex-col">
            <h3 class="font-bold text-3xl text-blue-500">{{ $title }}</h3>
            <p class="ml-4 font-semibold text-lg">By 'author name'</p>
        </div>

        <p class="font-semibold text-lg">
            @foreach ($chords as $chord)
                {{ $chord->name }}
            @endforeach
        </p>

        <p class="whitespace-nowrap overflow-hidden text-ellipsis">{{ $description }}</p>
    </a>
</div>