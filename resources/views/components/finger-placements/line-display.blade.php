@props(['fret', 'muteString'])

<!-- This component will be replaced by chord diagrams -->

<div class="flex gap-6">
    <p class="w-16 text-center">--{{ $muteString ? '#' : $fret }}--</p>
</div>