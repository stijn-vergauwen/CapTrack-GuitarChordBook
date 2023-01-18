<x-layout.base>

    <x-slot:title>
        Song
    </x-slot>

    <main class="py-12 flex flex-col items-center gap-12">
        <section class="container max-w-2xl flex flex-col">
            
            <div class="w-full mb-6">
                <x-link-block :href="route('songsOverview')" text="<- Back to overview" />
            </div>

            <div class="p-12 bg-white flex flex-col gap-12">
                <div>
                    <p class="font-bold text-lg">Song title</p>
                    <h2 class="font-bold text-4xl text-blue-500">{{ $song->title }}</h2>
                </div>
                
                <div>
                    <p class="font-bold text-lg">About this song</p>
                    <p class="text-lg">{{ $song->description }}</p>
                </div>

                <div class="flex justify-end">
                    <x-link-block :href="route('songEditor', ['id' => $song->id])" text="Edit song" />
                </div>

                <div>
                    <p class="font-bold text-lg">Chords in this song</p>

                    <div class="flex gap-4">
                        @foreach ($selectedChords as $selectedChord)
                    
                            <a class="px-4 py-1 bg-neutral-100" href="{{ route('chordInfo', ['id' => $selectedChord->id]) }}">
                                <p class="font-bold text-xl text-blue-500">{{ $selectedChord->name }}</p>
                            </a>
    
                        @endforeach
                    </div>
                </div>

            </div>

        </section>
    </main>
</x-layout.base>