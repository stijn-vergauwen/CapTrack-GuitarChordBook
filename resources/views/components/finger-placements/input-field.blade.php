@props(['string', 'fret' => 0, 'muteString' => false])

<fieldset class="flex gap-6">
    <p class="w-16 text-center">{{ $string + 1 }}</p>
    <input class="w-16 border-2" type="number" name="strings[{{ $string }}][fret]" min="0" max="24" value="{{ $fret }}">
    @if ($muteString)
        <input class="w-16 m-1" type="checkbox" name="strings[{{ $string }}][mute_string]" checked>
        
    @else
        <input class="w-16 m-1" type="checkbox" name="strings[{{ $string }}][mute_string]">
    @endif
</fieldset>