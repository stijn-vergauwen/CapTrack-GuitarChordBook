@props(['id', 'title', 'chords'])

<x-cards.clickable-card :href="route('songInfo', ['id' => $id])" class="border-primary-600 flex justify-between items-center">
    <div class="flex flex-col">
        <h3 class="font-bold text-3xl text-primary-600">{{ $title }}</h3>
        <p class="ml-4">By 'author name'</p>
    </div>
    
    <div class="flex flex-col">
        <p class="font-bold text-primary-600 text-end">
            @foreach ($chords as $chord)
                {{ $chord->name }}
            @endforeach
        </p>
    
        <p class="whitespace-nowrap overflow-hidden text-ellipsis">Tag Tag Tag</p>
    </div>
</x-cards.clickable-card>