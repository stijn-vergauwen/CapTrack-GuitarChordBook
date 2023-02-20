<x-layout.base>

    <x-slot:title>
        Chords
    </x-slot>

    <main class="flex flex-col">
        <x-title text="Chords" />

        <div class="px-40 flex gap-24">

            <x-content-container class="w-64">
                <p class="text-2xl font-bold text-center">Tags</p>
            </x-content-container>
            
            <x-chords.chords-grid :chords="$chords" />

            <div class="w-64 flex-shrink">
                <x-button.hollow :href="route('chordCreator')" class="font-bold">Add new chord</x-button.hollow>
            </div>

        </div>
        
    </main>

</x-layout.base>