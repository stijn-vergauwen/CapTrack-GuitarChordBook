<x-layout.base>

    <x-slot:title>
        Create song
    </x-slot>

    <x-slot:resources>
        @vite('resources/js/multiselect/chordsSelector.js')
        @vite('resources/js/multiselect/tagsSelector.js')
    </x-slot>

    <x-layout.page-container pageTitle="Create song">

        <x-slot:left>
            <x-button.list :href="route('songsOverview')" class="font-bold">Cancel</x-button.list>
            <x-button.list class="font-bold" form="song-create-form" type="submit">Save song</x-button.list>
        </x-slot:left>

        <x-layout.content-container spacing="p-12" class="flex-grow">
            <form id="song-create-form" action="{{ route('song.create') }}" method="post">
                @csrf

                <div class="flex mb-16">
                    <div class="w-1/2 flex flex-col gap-8">

                        <x-form.input label="Song title" id="song-title" name="title" placeholder="Title of the song" />
                        
                        <x-form.input label="Song description" id="song-description" name="description" placeholder="Short description" />
                        
                    </div>

                    <div class="w-1/2">
                        <div class="flex">
                            <div class="w-1/2">
                                <p class="font-bold">Artist</p>
                                
                                <p class="font-bold text-primary-600">Name</p>
                            </div>

                            <div class="w-1/2">
                                <p class="font-bold">Search artists</p>
                                <p class="border-2 px-2 py-1">Search</p>
        
                                <div class="flex flex-col gap-2 mt-2">
                                    <p class="px-6 py-1 font-bold text-primary-600 bg-neutral-100">artist</p>
                                    <p class="px-6 py-1 font-bold text-primary-600 bg-neutral-100">artist</p>
                                    <p class="px-6 py-1 font-bold text-primary-600 bg-neutral-100">artist</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <x-multiselect itemName="chords" :items="$chords" />

                <x-multiselect itemName="tags" :items="$tags" />
                    
            </form>
        </x-layout.content-container>

    </x-layout.page-container>

</x-layout.base>