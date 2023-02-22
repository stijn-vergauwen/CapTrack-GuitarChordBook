<x-layout.base>

    <x-slot:title>
        Create chord
    </x-slot>

    <x-layout.page-container pageTitle="Create chord">

        <x-slot:left>
            <x-button.list :href="route('chordsOverview')" class="font-bold">Cancel</x-button.list>
            <x-button.list class="font-bold" form="chord-create-form" type="submit">Save Chord</x-button.list>
        </x-slot:left>

        <x-layout.content-container spacing="p-12" class="flex-grow">
            <form id="chord-create-form" action="{{ route('chord.create') }}" method="post">
                @csrf

                <div class="flex mb-16">
                    <div class="w-1/2 flex flex-col gap-8">

                        <x-form.input label="Chord name" id="chord-name" name="name" />
                        
                        <x-form.input label="Chord description" id="chord-description" name="description" />
                        
                    </div>

                    <!-- TODO: replace this with chord diagram component -->
                    <div class="w-1/2">
                        <p class="font-semibold text-lg">Finger placement</p>

                        <div class="p-2 inline-flex flex-col gap-1 border-2">

                            <div class="flex gap-6">
                                <p class="w-16 font-semibold text-lg text-center">String</p>
                                <p class="w-16 font-semibold text-lg text-center">Fret</p>
                                <p class="w-16 font-semibold text-lg text-center">Muted?</p>
                            </div>

                            @for ($i = 0; $i < 6; $i++)
                            
                                <x-finger-placements.input-field :string="$i"/>
                                
                            @endfor

                        </div>
                    </div>
                </div>

                <div class="flex">
                    <div class="w-1/2">
                        <p class="font-bold">Select tags</p>
                        <p class="border-2 px-2 py-1 w-40">Search</p>

                        <div>
                            <p class="inline-block px-6 py-1 my-2 font-bold text-primary-600 bg-neutral-100">tag</p>
                            <p class="inline-block px-6 py-1 my-2 font-bold text-primary-600 bg-neutral-100">tag</p>
                            <p class="inline-block px-6 py-1 my-2 font-bold text-primary-600 bg-neutral-100">tag</p>
                        </div>
                    </div>

                    <div class="w-1/2">
                        <p class="font-bold">Current tags</p>

                    </div>
                </div>
                    
            </form>
        </x-layout.content-container>
        
    </x-layout.page-container>
</x-layout.base>