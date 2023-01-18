<x-layout.base>

    <x-slot:title>
        Edit song
    </x-slot>

    <x-slot:resources>
        @vite('resources/js/chordsSelector.js')
    </x-slot>

    <main class="py-12 flex flex-col items-center gap-12">
        <section class="container max-w-2xl flex flex-col">
            
            <div class="w-full mb-6">
                <x-link-block :href="route('songInfo', ['id' => $song->id])" text="<- Back to song info"/>
            </div>

            <div class="p-12 flex flex-col gap-8 bg-white">
                <h2 class="font-bold text-2xl">Edit song</h2>

                <form class="flex flex-col justify-between gap-8" action="{{ route('song.edit') }}" method="post">
                    @csrf

                    <input type="hidden" name="id" value="{{ $song->id }}">

                    <div>
                        <label class="block font-semibold text-lg" for="song-title">Song title</label>
                        <input class="border-2 p-2 text-lg w-full"
                            id="song-title" name="title" type="text" value="{{ $song->title }}">
                    </div>

                    <div>
                        <label class="block font-semibold text-lg" for="song-description">Song description</label>
                        <input class="border-2 p-2 text-lg w-full"
                            id="song-description" name="description" type="text" value="{{ $song->description }}">
                    </div>

                    <div>
                        <p class="block font-semibold text-lg">Select chords used in this song</p>

                        <x-songs.chords-selector :allChords="$allChords" :selectedChords="$selectedChords" />
                    </div>
                        
                    <div class="flex justify-end">
                        <x-button-block text="Save changes"/>
                    </div>
                </form>

                <form class="flex justify-end" action="{{ route('song.delete') }}" method="post">
                    @csrf

                    <input type="hidden" name="id" value="{{ $song->id }}">

                    <button class="py-2 px-4 font-bold text-red-400 hover:text-red-600 focus:text-red-600 transition">Delete song</button>
                </form>
            </div>

        </section>
    </main>
</x-layout.base>