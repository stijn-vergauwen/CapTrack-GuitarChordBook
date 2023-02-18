<footer class="px-40 py-10 bg-white flex justify-between">
    <div class="flex flex-col gap-4">
        <x-logo />

        <p class=" leading-tight">
            A site built by Stijn Vergauwen. <br>
            My goal is to build a place to easily see and <br>
            keep track of chords and songs for guitar, <br>
            so you can stay focussed on learning. <br>
            Simple as that!
        </p>
    </div>

    <div>
        <ul>
            <li><x-link-text :href="route('home')" text="Home" /></li>
            <li><x-link-text :href="route('chordsOverview')" text="Chords" /></li>
            <li><x-link-text :href="route('songsOverview')" text="Songs" /></li>
        </ul>
    </div>
</footer>