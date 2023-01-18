@props(['songs'])

<section class="w-full max-w-5xl flex flex-col">

    @foreach ($songs as $song)

        <x-songs.song-item :id="$song->id" :title="$song->title" :description="$song->description" :chords="$song->chords" />

    @endforeach

</section>