@props(['id', 'title', 'chords', 'tags'])

<x-cards.clickable-card :href="route('songInfo', ['id' => $id])" class="border-primary-600 flex justify-between items-center">

    <div class="flex flex-col">
        <h3 class="font-bold text-3xl text-primary-600">{{ $title }}</h3>
        <p class="ml-4">By 'author name'</p>
    </div>
    
    <div class="flex flex-col">
        <div class="flex justify-end flex-wrap gap-4">
            @foreach ($chords as $chord)

                <p class="font-bold text-primary-600">{{ $chord->name }}</p>
                
            @endforeach
        </div>

        <div class="flex justify-end flex-wrap gap-4">
            @for ($i = 0; $i < (count($tags) > 3 ? 3 : count($tags)); $i++)

                <p>{{ $tags[$i]->name }}</p>

            @endfor
        </div>
    </div>

</x-cards.clickable-card>