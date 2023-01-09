<x-layout.base>

    <x-slot:title>
        Create chord
    </x-slot>

    <main class="py-12 flex flex-col items-center gap-12">
        <section class="container max-w-2xl flex flex-col">

            <div class="w-full mb-6">
                <x-link-block :href="route('songsOverview')" text="<- Back to overview" />
            </div>

            <div class="p-12 bg-white">
                <h2 class="mb-8 font-bold text-2xl">Create new Song</h2>

                <form class="flex flex-col justify-between gap-8" action="create" method="post">
                    @csrf

                    <div>
                        <label class="block font-semibold text-lg" for="song-title">Song title</label>
                        <input class="border-2 p-2 text-lg w-full"
                            id="song-title" name="title" type="text" placeholder="Write the title of the song here">
                    </div>

                    <div>
                        <label class="block font-semibold text-lg" for="song-description">Song description</label>
                        <input class="border-2 p-2 text-lg w-full"
                            id="song-description" name="description" type="text" placeholder="Write a short description here">
                    </div>

                    <div class="flex justify-end">
                        <x-button-block text="Create Song" />
                    </div>
                </form>
            </div>

        </section>
    </main>
</x-layout.base>