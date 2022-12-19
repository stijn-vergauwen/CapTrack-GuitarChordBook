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

            <div class="p-12 bg-white">
                <p class="font-bold text-lg">Chord name</p>
                <h2 class="font-bold text-4xl mb-12 text-blue-500">{{ $chord->name }}</h2>
                
                <p class="font-bold text-lg">About this chord</p>
                <p class="text-lg">{{ $chord->description }}</p>
            </div>

        </section>
    </main>
</x-layout.base>