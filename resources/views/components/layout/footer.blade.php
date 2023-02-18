<footer class="px-40 py-16 bg-white flex justify-between">
    <div class="flex flex-col gap-4">
        <x-logo />

        <p class="leading-tight">
            A site built by Stijn Vergauwen. <br>
            My goal is to build a place to easily see and <br>
            keep track of chords and songs for guitar, <br>
            so you can stay focussed on learning. <br>
            Simple as that!
        </p>
    </div>

    <div class="mr-10 flex flex-col">
        <x-button.text :href="route('home')">Home</x-button.text>
        <x-button.text :href="route('chordsOverview')">Chords</x-button.text>
        <x-button.text :href="route('songsOverview')">Songs</x-button.text>
    </div>
</footer>