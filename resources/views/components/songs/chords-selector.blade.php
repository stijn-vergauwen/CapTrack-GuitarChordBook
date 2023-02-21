@props(['allChords' => [], 'selectedChords' => ''])

<div class="chords-selector flex mb-16">
    <input id="chords-selector-input" type="hidden" name="chords" value="{{ $selectedChords }}">

    <div class="w-1/2">
        <p class="font-bold">Select chords</p>
        <p class="border-2 px-2 py-1 w-40">Search</p>

        <div id="chords-selector-list" class="w-60 flex flex-wrap gap-2 max-h-60 overflow-y-auto">
    
            @foreach ($allChords as $chord)
                
                <x-songs.chord-select-item :id="$chord->id" :name="$chord->name" />
        
            @endforeach
            
        </div>
    </div>

    <div class="w-1/2">
        <p class="font-bold">Current chords</p>

        <div id="chords-selector-selected" class="w-60 flex flex-wrap gap-2 max-h-60 overflow-y-auto"></div>
    </div>
</div>