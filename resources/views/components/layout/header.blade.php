<header class="px-40 py-10 bg-white flex justify-between">
    <div class="">
        <x-logo />
    </div>

    <nav class="flex items-center">
        <x-link-text :href="route('home')" text="Home" />
        <x-link-text :href="route('chordsOverview')" text="Chords" />
        <x-link-text :href="route('chordCreator')" text="Create chord" />
        <x-link-text :href="route('songsOverview')" text="Songs" />
        <x-link-text :href="route('songCreator')" text="Create song" />
    </nav>
</header>