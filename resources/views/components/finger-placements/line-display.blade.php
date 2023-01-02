@props(['fret', 'muteString'])

<div class="flex gap-6">
    <p class="w-16 text-center">--{{ $muteString ? '#' : $fret }}--</p>
</div>