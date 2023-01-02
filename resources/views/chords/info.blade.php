<x-layout.base>

    <x-slot:title>
        Chord
    </x-slot>

    <main class="py-12 flex flex-col items-center gap-12">
        <section class="container max-w-2xl flex flex-col">

            <div class="w-full mb-6">
                <a class="py-2 px-4 font-bold text-white bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 transition"
                    href="{{ route('chordOverview') }}"
                >
                    <- Back to overview
                </a>
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
                    <a class="py-2 px-4 font-bold text-white bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 transition"
                        href="{{ route('chordEditor', ['id' => $chord->id]) }}"
                    >
                        Edit chord
                    </a>
                </div>
            </div>

        </section>
    </main>
</x-layout.base>