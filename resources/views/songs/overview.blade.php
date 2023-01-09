<x-layout.base>

    <x-slot:title>
        Songs
    </x-slot>

    <main class="py-12 flex flex-col items-center gap-12">
        <h2 class="px-20 font-bold text-3xl text-center border-b-2 border-blue-600">
            All songs
        </h2>

        <x-songs.songs-list :songs="$songs" />
        
    </main>

</x-layout.base>