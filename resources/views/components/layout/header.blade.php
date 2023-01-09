<header class="bg-white p-6 flex justify-between text-blue-500">
    <div class="">
        <a href="{{ route('home') }}">
            <h1 class="font-bold text-3xl hover:text-blue-600 transition">Chord Book</h1>
        </a>
    </div>

    <nav class="flex items-center">
        <x-link-text :href="route('home')" text="Home" />
        <x-link-text :href="route('chordsOverview')" text="Chords" />
        <x-link-text :href="route('chordCreator')" text="Create chord" />
        <x-link-text :href="route('songsOverview')" text="Songs" />
        <x-link-text :href="route('songCreator')" text="Create song" />
    </nav>
</header>