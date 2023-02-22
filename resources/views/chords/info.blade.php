<x-layout.base>

    <x-slot:title>
        Chord
    </x-slot>

    <x-layout.page-container pageTitle="Chord info">

        <x-slot:left>
            <x-button.list :href="route('chordsOverview')" class="font-bold"><- Back to overview</x-button.list>
            <x-button.list :href="route('chordEditor', ['id' => $chord->id])" class="font-bold">Edit chord</x-button.list>
        </x-slot:left>

        <x-content-container spacing="p-12" class="flex-grow">

            <div class="flex mb-16">
                <div class="w-1/2 flex flex-col gap-8">
                    <div>
                        <p class="font-bold">Chord name</p>
                        <h2 class="font-bold text-3xl text-primary-600">{{ $chord->name }}</h2>
                    </div>

                    <div>
                        <p class="font-bold">Tags</p>
                        <p class="font-bold text-primary-600">Tag Tag Tag</p>
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

    </x-layout.page-container>
</x-layout.base>