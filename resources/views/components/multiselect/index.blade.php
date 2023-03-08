@props([
    'itemName',
    'columnToDisplay' => 'name',
    'items' => [],
    'selectedItems' => '',
])

<section id="{{ $itemName }}-multiselect" class="flex">
    <input class="hidden-input" type="hidden" name="{{ $itemName }}" value="{{ $selectedItems }}">

    <div class="w-1/2">
        <p class="font-bold">Select {{ $itemName }}</p>

        <!-- TODO: Make search bar functional -->
        <p class="border-2 px-2 py-1 w-40">Search</p>

        <div class="multiselect-list w-60 flex flex-wrap gap-2 max-h-60 overflow-y-auto">
    
            @foreach ($items as $item)

                <x-multiselect.select-item :name="$item->$columnToDisplay" data="data-item-id={{ $item->id }}" />
        
            @endforeach
            
        </div>
    </div>

    <div class="w-1/2">
        <p class="font-bold">Current {{ $itemName }}</p>

        <div class="selected-list w-60 flex flex-wrap gap-2 max-h-60 overflow-y-auto"></div>
    </div>
</section>