<x-layout.base>

    <x-slot:title>
        Edit chord
    </x-slot>

    <main class="flex flex-col min-h-screen">
        <x-title text="Edit chord" />

        <div class="px-40 flex gap-24">

            <div class="w-64">
                <x-button.list :href="route('chordInfo', ['id' => $chord->id])" class="font-bold">Cancel</x-button.list>

                <x-button.list class="font-bold" form="chord-edit-form" type="submit">Save Changes</x-button.list> 

                <form action="{{ route('chord.delete') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $chord->id }}">

                    <x-button.list class="font-bold" type="submit" text="text-red-400">Delete chord</x-button.list>
                </form>
            </div>


            <x-content-container spacing="p-12" class="flex-grow">
                <form id="chord-edit-form" action="{{ route('chord.edit') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $chord->id }}">

                    <div class="flex mb-16">
                        <div class="w-1/2 flex flex-col gap-8">

                            <x-form.input label="Chord name" id="chord-name" name="name" :value="$chord->name" />
                            
                            <x-form.input label="Chord description" id="chord-description" name="description" :value="$chord->description" />

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

                                @foreach ($chord->fingerPlacements as $fingerPlacement)

                                    <x-finger-placements.input-field
                                        :string="$fingerPlacement->string"
                                        :fret="$fingerPlacement->fret"
                                        :muteString="$fingerPlacement->mute_string"
                                    />
                                    
                                @endforeach

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
            </x-content-container>

            <div class="w-64">
                
            </div>

        </div>
    </main>
</x-layout.base>