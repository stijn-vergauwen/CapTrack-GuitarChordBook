<x-layout.base>

    <x-slot:title>
        Chord
    </x-slot>

    <div class="flex flex-col justify-center items-center min-h-screen">
        <section class="container max-w-2xl p-12 flex flex-col gap-12 bg-white">
            <h2 class="font-bold text-2xl">{{ $chord->name }}</h2>
            
            <p class="text-lg">{{ $chord->description }}</p>
        </section>
    </div>
</x-layout.base>