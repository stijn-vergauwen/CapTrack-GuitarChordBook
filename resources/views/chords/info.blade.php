<x-layout.base>

    <x-slot:title>
        Chord
    </x-slot>

    <main class="flex flex-col">
        <x-title text="Chord info" />

        <div class="px-40 flex gap-24">

            <div class="w-64">
                <x-button.list :href="route('chordsOverview')" class="font-bold"><- Back to overview</x-button.list>
                <x-button.list :href="route('chordEditor', ['id' => $chord->id])" class="font-bold">Edit chord</x-button.list>
            </div>


            <div class="p-12 bg-white flex flex-col gap-12">
                <div>
                    <p class="font-bold text-lg">Chord name</p>
                    <h2 class="font-bold text-4xl text-blue-500">{{ $chord->name }}</h2>
                </div>
                
                <div>
                    <p class="font-bold text-lg">About this chord</p>
                    <p class="text-lg">{{ $chord->description }}</p>
                </div>

                <div>
                    <p class="font-semibold text-lg">Finger placement</p>

                    @foreach ($chord->fingerPlacements as $fingerPlacement)

                        <x-finger-placements.line-display
                            :fret="$fingerPlacement->fret"
                            :muteString="$fingerPlacement->mute_string"
                        />
                        
                    @endforeach

                </div>

                <div class="flex justify-end">
                    <x-button.full :href="route('chordEditor', ['id' => $chord->id])">Edit chord</x-button.full>
                </div>

            </div>

            <div class="w-64">
                
            </div>

        </div>
    </main>
</x-layout.base>