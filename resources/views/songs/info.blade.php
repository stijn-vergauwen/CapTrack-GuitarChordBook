<x-layout.base>

    <x-slot:title>
        Song
    </x-slot>
    
    <x-layout.page-container pageTitle="Song info">

        <x-slot:left>
            <x-button.list :href="route('songsOverview')" class="font-bold"><- Back to overview</x-button.list>
            <x-button.list :href="route('songEditor', ['id' => $song->id])" class="font-bold">Edit song</x-button.list>
        </x-slot:left>

        <x-layout.content-container spacing="p-12" class="flex-grow">

            <div class="flex mb-16">
                <div class="w-1/2 flex flex-col gap-8">
                    <div>
                        <p class="font-bold">Song title</p>
                        <h2 class="font-bold text-3xl text-primary-600">{{ $song->title }}</h2>
                    </div>

                    <div>
                        <p class="font-bold">Tags</p>
                        <p class="font-bold text-primary-600">Tag Tag Tag</p>
                    </div>
                    
                    <div>
                        <p class="font-bold">About this song</p>
                        <p class="">{{ $song->description }}</p>
                    </div>
                </div>

                <div class="w-1/2">
                    <p class="font-bold">Artist</p>
                    
                    <p class="font-bold text-3xl text-primary-600">Name</p>
                </div>
            </div>

            <div>
                <p class="font-bold text-3xl">Chords</p>

                <div class="flex gap-4">
                    @foreach ($selectedChords as $selectedChord)
                
                        <a class="px-4 py-1 bg-neutral-100" href="{{ route('chordInfo', ['id' => $selectedChord->id]) }}">
                            <p class="font-bold text-primary-600">{{ $selectedChord->name }}</p>
                        </a>

                    @endforeach
                </div>
            </div>

        </x-layout.content-container>
    </x-layout.page-container>
</x-layout.base>