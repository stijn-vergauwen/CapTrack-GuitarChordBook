<x-layout.base>

    <x-slot:title>
        Chords
    </x-slot>

    <main class="py-12 flex flex-col items-center gap-12">
        <h2 class="px-20 font-bold text-3xl text-center border-b-2 border-blue-600">
            All chords
        </h2>

        <x-chords.chords-grid :chords="$chords" />
        
    </main>

</x-layout.base>