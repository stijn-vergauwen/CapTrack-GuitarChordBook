@props(['id', 'name', 'description'])

<div class="aspect-square w-1/3 p-6">
    <a class="w-full h-full flex flex-col items-stretch border-2 border-opacity-0 border-blue-500 hover:border-opacity-100 transition"
        href="{{ route('chordInfo', ['id' => $id]) }}"
    >
        <div class="relative flex-1 bg-neutral-300">
            <div class=" absolute top-4 left-4">
                <h3 class="font-bold text-2xl text-blue-500">{{ $name }}</h3>
            </div>
        </div>

        <div class="h-20 p-4 flex flex-col bg-white">
            <p class="whitespace-nowrap overflow-hidden text-ellipsis">{{ $description }}</p>
        </div>
    </a>
</div>