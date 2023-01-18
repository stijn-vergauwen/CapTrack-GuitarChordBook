@props(['allChords' => [], 'selectedChords' => ''])

<div class="chords-selector flex justify-between">

    <input id="chords-selector-input" type="hidden" name="chords" value="{{ $selectedChords }}">

    <div id="chords-selector-list" class="flex flex-col gap-2 pr-4 max-h-80 overflow-y-scroll">

        @foreach ($allChords as $chord)
            
            <x-songs.chord-select-item :id="$chord->id" :name="$chord->name" />
    
        @endforeach
        
    </div>

    <div id="chords-selector-selected" class="flex flex-col gap-2 pr-4 max-h-80 overflow-y-auto">
    </div>

</div>