<header class="bg-white p-6 flex justify-between text-blue-500">
    <div class="">
        <a href="{{ route('home') }}">
            <h1 class="font-bold text-3xl hover:text-blue-600 transition">Chord Book</h1>
        </a>
    </div>

    <nav class="flex items-center gap-8 font-semibold">
        <a class="hover:text-blue-600 transition" href="{{ route('home') }}">Home</a>
        <a class="hover:text-blue-600 transition" href="{{ route('chordOverview') }}">Chords</a>
        <a class="hover:text-blue-600 transition" href="{{ route('chordCreator') }}">Create chord</a>
    </nav>
</header>