<x-layout.base>

    <x-slot:title>
        Home
    </x-slot>

    <main class="flex flex-col items-center min-h-screen">
        <x-title text="Featured" />

        <div class="w-full max-w-7xl flex gap-8">

            <x-content-container class="w-80 flex flex-col">
                <p class="text-primary-600 font-bold text-3xl">Name</p>
                <p class="mb-4">Tag Tag Tag</p>
                <p>Short description</p>
            </x-content-container>

            <div class="flex flex-col gap-4 flex-1">

                <x-content-container>
                    <div class="flex justify-between">
                        <p class="text-primary-600 font-bold text-3xl">Song name</p>
                        <p class="text-primary-600 font-bold">Chord Chord Chord</p>
                    </div>
                    
                    <div class="flex justify-between">
                        <p>By name of artist</p>
                        <p>Tag Tag Tag</p>
                    </div>
                </x-content-container>

                <x-content-container>
                    <div class="flex justify-between">
                        <p class="text-primary-600 font-bold text-3xl">Song name</p>
                        <p class="text-primary-600 font-bold">Chord Chord Chord</p>
                    </div>
                    
                    <div class="flex justify-between">
                        <p>By name of artist</p>
                        <p>Tag Tag Tag</p>
                    </div>
                </x-content-container>

            </div>

        </div>
        
    </main>

</x-layout.base>