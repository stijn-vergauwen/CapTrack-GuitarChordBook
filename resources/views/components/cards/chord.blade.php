@props(['id', 'name', 'description', 'tags'])

<x-cards.clickable-card :href="route('chordInfo', ['id' => $id])">
    <div class="flex justify-center">
        <x-chord-diagram.diagram />
    </div>

    <h3 class="font-bold text-3xl text-primary-600">{{ $name }}</h3>

    <div class="flex flex-wrap gap-4">

        @for ($i = 0; $i < (count($tags) > 3 ? 3 : count($tags)); $i++)
    
            <p>{{ $tags[$i]->name }}</p>
    
        @endfor

    </div>

</x-cards.clickable-card>