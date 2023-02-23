<x-layout.base>

    <x-slot:title>
        Chord
    </x-slot>

    <x-layout.page-container pageTitle="Chord info">

        <x-slot:left>
            <x-button.list :href="route('chordsOverview')" class="font-bold"><- Back to overview</x-button.list>
            <x-button.list :href="route('chordEditor', ['id' => $chord->id])" class="font-bold">Edit chord</x-button.list>
        </x-slot:left>

        <x-layout.content-container spacing="p-12" class="flex-grow">

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

                <div class="inline-flex flex-col gap-4">
                    @foreach ($chord->songs as $song)

                        <x-multiselect.link-item :href="route('songInfo', ['id' => $song->id])">
                            {{ $song->title }}
                        </x-multiselect.link-item>

                    @endforeach
                </div>
            </div>

        </x-layout.content-container>

    </x-layout.page-container>
</x-layout.base>