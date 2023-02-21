<x-layout.base>

    <x-slot:title>
        Songs
    </x-slot>

    <main class="flex flex-col min-h-screen">
        <x-title text="Songs" />

        <div class="px-40 flex gap-24">

            <x-content-container class="w-64">
                <p class="text-2xl font-bold text-center">Tags</p>
            </x-content-container>
            
            <x-songs.songs-list :songs="$songs" />

            <div class="w-64 flex-shrink">
                <x-button.hollow :href="route('songCreator')" class="font-bold">Add new song</x-button.hollow>
            </div>

        </div>
        
    </main>

</x-layout.base>