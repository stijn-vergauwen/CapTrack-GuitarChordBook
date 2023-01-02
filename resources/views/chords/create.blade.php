<x-layout.base>

    <x-slot:title>
        Create chord
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

            <div class="p-12 bg-white">
                <h2 class="mb-8 font-bold text-2xl">Create new Chord</h2>

                <form class="flex flex-col justify-between gap-8" action="create" method="post">
                    @csrf

                    <div>
                        <label class="block font-semibold text-lg" for="chord-name">Chord name</label>
                        <input class="border-2 p-2 text-lg w-full"
                            id="chord-name" name="name" type="text" placeholder="Write the name of the chord here">
                    </div>

                    <div>
                        <label class="block font-semibold text-lg" for="chord-name">Chord description</label>
                        <input class="border-2 p-2 text-lg w-full"
                            id="chord-description" name="description" type="text" placeholder="Write a short description here">
                    </div>

                    <div>
                        <p class="font-semibold text-lg">Finger placement</p>

                        <div class="p-2 inline-flex flex-col gap-1 border-2">

                            <div class="flex gap-6">
                                <p class="w-16 font-semibold text-lg text-center">String</p>
                                <p class="w-16 font-semibold text-lg text-center">Fret</p>
                                <p class="w-16 font-semibold text-lg text-center">Muted?</p>
                            </div>

                            @for ($i = 0; $i < 6; $i++)
                                
                                <x-finger-placements.input-field :string="$i"/>
                                
                            @endfor

                        </div>

                    </div>

                    <div class="flex justify-end">
                        <button class="py-2 px-4 font-bold text-white bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 transition">Create Chord</button>
                    </div>
                </form>
            </div>

        </section>
    </main>
</x-layout.base>