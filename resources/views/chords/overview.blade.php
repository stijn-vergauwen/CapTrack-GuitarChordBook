<x-layout.base>

    <x-slot:title>
        Chords
    </x-slot>

    <x-layout.page-container pageTitle="Chords">

        <x-slot:left>
            <x-content-container>
                <p class="text-2xl font-bold text-center">Tags</p>
            </x-content-container>
        </x-slot:left>

        <section class="grid grid-cols-3 auto-rows-auto gap-8 flex-grow">

            @foreach ($chords as $chord)
                
                <x-chords.chord-item :id="$chord->id" :name="$chord->name" :description="$chord->description"/>

            @endforeach

        </section>
        
        <x-slot:right>
            <x-button.hollow :href="route('chordCreator')" class="font-bold">Add new chord</x-button.hollow>
        </x-slot:right>

    </x-layout.page-container>
</x-layout.base>