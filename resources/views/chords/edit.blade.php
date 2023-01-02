<x-layout.base>

    <x-slot:title>
        Edit chord
    </x-slot>

    <main class="py-12 flex flex-col items-center gap-12">
        <section class="container max-w-2xl flex flex-col">

            <div class="w-full mb-6">
                <a class="py-2 px-4 font-bold text-white bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 transition"
                    href="{{ route('chordInfo', ['id' => $chord->id]) }}"
                >
                    <- Back to chord info
                </a>
            </div>

            <div class="p-12 flex flex-col gap-8 bg-white">
                <h2 class="font-bold text-2xl">Edit chord</h2>

                <form class="flex flex-col justify-between gap-8" action="{{ route('chord.edit') }}" method="post">
                    @csrf

                    <input type="hidden" name="id" value="{{ $chord->id }}">

                    <div>
                        <label class="block font-semibold text-lg" for="chord-name">Chord name</label>
                        <input class="border-2 p-2 text-lg w-full"
                            id="chord-name" name="name" type="text" value="{{ $chord->name }}">
                    </div>

                    <div>
                        <label class="block font-semibold text-lg" for="chord-name">Chord description</label>
                        <input class="border-2 p-2 text-lg w-full"
                            id="chord-description" name="description" type="text" value="{{ $chord->description }}">
                    </div>

                    <div>
                        <p class="font-semibold text-lg">Finger placement</p>

                        <div class="p-2 inline-flex flex-col gap-1 border-2">

                            <div class="flex gap-6">
                                <p class="w-16 font-semibold text-lg text-center">String</p>
                                <p class="w-16 font-semibold text-lg text-center">Fret</p>
                                <p class="w-16 font-semibold text-lg text-center">Muted?</p>
                            </div>

                            @foreach ($chord->fingerPlacements as $fingerPlacement)

                                <x-finger-placements.input-field
                                    :string="$fingerPlacement->string"
                                    :fret="$fingerPlacement->fret"
                                    :muteString="$fingerPlacement->mute_string"
                                />
                                
                            @endforeach

                        </div>

                    </div>

                    <div class="flex justify-end">
                        <button class="py-2 px-4 font-bold text-white bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 transition">Save changes</button>
                    </div>
                </form>

                <form class="flex justify-end" action="{{ route('chord.delete') }}" method="post">
                    @csrf

                    <input type="hidden" name="id" value="{{ $chord->id }}">

                    <button class="py-2 px-4 font-bold text-red-400 hover:text-red-600 focus:text-red-600 transition">Delete chord</button>
                </form>
            </div>

        </section>
    </main>
</x-layout.base>