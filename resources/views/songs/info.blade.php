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

                        <div class="inline-flex">
                            @foreach ($song->tags as $tag)

                                <a class="px-2 py-1 text-base font-bold text-primary-600 hover:text-primary-700 transition" href="#">
                                    {{ $tag->name }}
                                </a>

                            @endforeach
                        </div>
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
                <h2 class="font-bold text-3xl">Chords</h2>
                <p>Chords used in this song</p>

                <div class="flex gap-4">
                    @foreach ($song->chords as $chord)

                        <x-multiselect.link-item :href="route('chordInfo', ['id' => $chord->id])">
                            {{ $chord->name }}
                        </x-multiselect.link-item>

                    @endforeach
                </div>
            </div>

        </x-layout.content-container>

    </x-layout.page-container>
</x-layout.base>