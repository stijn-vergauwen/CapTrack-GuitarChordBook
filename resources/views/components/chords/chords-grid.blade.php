@props(['chords'])

<section class="grid grid-cols-3 auto-rows-auto gap-8 flex-grow">

    @foreach ($chords as $chord)
        
        <x-chords.chord-item :id="$chord->id" :name="$chord->name" :description="$chord->description"/>

    @endforeach

</section>