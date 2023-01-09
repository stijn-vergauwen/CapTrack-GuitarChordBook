@props(['chords'])

<div>

    @foreach ($chords as $chord)
        
        <x-songs.chord-select-item :id="$chord->id" :name="$chord->name" />

    @endforeach

</div>