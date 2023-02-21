@props(['songs'])

<section class="flex-grow flex flex-col gap-8">

    @foreach ($songs as $song)

        <x-songs.song-item :id="$song->id" :title="$song->title" :chords="$song->chords" />

    @endforeach

</section>