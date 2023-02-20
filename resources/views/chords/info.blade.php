<x-layout.base>

    <x-slot:title>
        Chord
    </x-slot>

    <main class="flex flex-col min-h-screen">
        <x-title text="Chord info" />

        <div class="px-40 flex gap-24">

            <div class="w-64">
                <x-button.list :href="route('chordsOverview')" class="font-bold"><- Back to overview</x-button.list>
                <x-button.list :href="route('chordEditor', ['id' => $chord->id])" class="font-bold">Edit chord</x-button.list>
            </div>


            <x-content-container spacing="p-12" class="flex-grow">

                <div class="flex mb-16">
                    <div class="w-1/2 flex flex-col gap-8">
                        <div>
                            <p class="font-bold">Chord name</p>
                            <h2 class="font-bold text-3xl text-blue-500">{{ $chord->name }}</h2>
                        </div>

                        <div>
                            <p class="font-bold">Tags</p>
                            <p class="font-bold text-blue-500">Tag Tag Tag</p>
                        </div>
                        
                        <div>
                            <p class="font-bold">About this chord</p>
                            <p class="">{{ $chord->description }}</p>
                        </div>
                    </div>

                    <div class="w-1/2">
                        <p class="font-bold">Finger placement</p>
    
                        @foreach ($chord->fingerPlacements as $fingerPlacement)
    
                            <x-finger-placements.line-display
                                :fret="$fingerPlacement->fret"
                                :muteString="$fingerPlacement->mute_string"
                            />
                            
                        @endforeach
                    </div>
                </div>

                <div>
                    <h2 class="font-bold text-3xl">Songs</h2>
                    <p>Songs that use this chord</p>

                    <div>
                        <p class="w-1/2 px-10 py-2 my-2 font-bold text-white bg-neutral-300">song</p>
                        <p class="w-1/2 px-10 py-2 my-2 font-bold text-white bg-neutral-300">song</p>
                        <p class="w-1/2 px-10 py-2 my-2 font-bold text-white bg-neutral-300">song</p>
                    </div>
                </div>

            </x-content-container>

            <div class="w-64">
                
            </div>

        </div>
    </main>
</x-layout.base>