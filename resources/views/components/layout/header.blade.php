<header class="px-40 py-4 bg-white flex justify-between">
    <x-logo />

    <nav class="flex items-center gap-4">
        <x-button.text class="font-bold" base="text-inherit" hover="hover:text-primary-600 focus:text-primary-600" :href="route('home')">Home</x-button.text>
        <x-button.text class="font-bold" base="text-inherit" hover="hover:text-primary-600 focus:text-primary-600" :href="route('chordsOverview')">Chords</x-button.text>
        <x-button.text class="font-bold" base="text-inherit" hover="hover:text-primary-600 focus:text-primary-600" :href="route('songsOverview')">Songs</x-button.text>
        <x-button.hollow class="font-bold ml-6" href="#">Login</x-button.hollow>
    </nav>
</header>