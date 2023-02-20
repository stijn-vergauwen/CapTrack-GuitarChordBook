@props(['id', 'name', 'description'])

<x-clickable-card :href="route('chordInfo', ['id' => $id])">
    <div class="flex justify-center">
        <x-chord-diagram />
    </div>

    <h3 class="font-bold text-3xl text-blue-500">{{ $name }}</h3>

    <p class="whitespace-nowrap overflow-hidden text-ellipsis">Tag Tag Tag</p>
</x-clickable-card>