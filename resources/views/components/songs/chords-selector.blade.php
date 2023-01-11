@props(['chords'])

<div class="chords-selector flex justify-between">

    <input id="chords-selector-input" type="hidden" name="chords" value='["2", "4", "5"]'>

    <div id="chords-selector-list" class="flex flex-col gap-2">

        @foreach ($chords as $chord)
            
            <x-songs.chord-select-item :id="$chord->id" :name="$chord->name" />
    
        @endforeach
        
    </div>

    <div>
        <p>placeholder for selected chords</p>
    </div>

</div>