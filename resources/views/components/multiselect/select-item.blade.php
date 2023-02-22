<!-- search results item, clickable to select / deselect -->

@props([
    'data',
    'name',
])

<div class="select-item px-4 py-1 bg-neutral-100 cursor-pointer" {{ $data }}>

    <p class="font-bold text-xl text-primary-600">{{ $name }}</p>

</div>