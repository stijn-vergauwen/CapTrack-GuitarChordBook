@props(['id', 'name', 'description'])

<x-cards.clickable-card :href="route('chordInfo', ['id' => $id])">
    <div class="flex justify-center">
        <x-chord-diagram.diagram />
    </div>

    <h3 class="font-bold text-3xl text-primary-600">{{ $name }}</h3>

    <p class="whitespace-nowrap overflow-hidden text-ellipsis">Tag Tag Tag</p>
</x-cards.clickable-card>