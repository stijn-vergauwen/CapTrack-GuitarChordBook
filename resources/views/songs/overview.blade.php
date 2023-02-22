<x-layout.base>

    <x-slot:title>
        Songs
    </x-slot>

    <x-layout.page-container pageTitle="Songs">

        <x-slot:left>
            <x-layout.content-container>
                <p class="text-2xl font-bold text-center">Tags</p>
            </x-layout.content-container>
        </x-slot:left>

        <section class="flex-grow flex flex-col gap-8">

            @foreach ($songs as $song)

                <x-cards.song :id="$song->id" :title="$song->title" :chords="$song->chords" />

            @endforeach

        </section>

        <x-slot:right>
            <x-button.hollow :href="route('songCreator')" class="font-bold">Add new song</x-button.hollow>
        </x-slot:right>

    </x-layout.page-container>
</x-layout.base>