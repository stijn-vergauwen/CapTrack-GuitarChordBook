<x-layout.base>

    <x-slot:title>
        Chords
    </x-slot>

    <main class="py-12 flex flex-col items-center gap-12">
        <h2 class="px-20 font-bold text-3xl text-center border-b-2 border-blue-600">
            All chords
        </h2>

        <section class="w-full max-w-5xl flex flex-wrap">
            <div class="aspect-square w-1/3 p-6">
                <a class="w-full h-full flex flex-col items-stretch border-2 border-opacity-0 border-blue-500 hover:border-opacity-100 transition"
                    href="#"
                >
                    <div class="relative flex-1 bg-neutral-300">
                        <div class=" absolute top-4 left-4">
                            <h3 class="font-bold text-2xl text-blue-500">Chord name</h3>
                        </div>
                    </div>
    
                    <div class="h-20 p-4 flex flex-col bg-white">
                        <p class="   whitespace-nowrap overflow-hidden text-ellipsis">Chord description. gets clipped if text is too long</p>
                    </div>
                </a>
            </div>
        </section>
    </main>

</x-layout.base>