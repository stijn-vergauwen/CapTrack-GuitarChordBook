<?php

namespace Database\Seeders;

use App\Models\FingerPlacement;
use Illuminate\Database\Seeder;
use App\Models\ChordFingerPlacement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FingerPlacementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FingerPlacement::create([
            'string' => 1,
            'fret' => 0,
            'mute_string' => false,
        ]);

        FingerPlacement::create([
            'string' => 2,
            'fret' => 1,
            'mute_string' => false,
        ]);

        FingerPlacement::create([
            'string' => 3,
            'fret' => 0,
            'mute_string' => false,
        ]);

        FingerPlacement::create([
            'string' => 4,
            'fret' => 2,
            'mute_string' => false,
        ]);

        FingerPlacement::create([
            'string' => 5,
            'fret' => 3,
            'mute_string' => false,
        ]);

        FingerPlacement::create([
            'string' => 6,
            'fret' => 0,
            'mute_string' => true,
        ]);

        ChordFingerPlacement::create([
            'chord_id' => 1,
            'finger_placement_id' => 1,
        ]);

        ChordFingerPlacement::create([
            'chord_id' => 1,
            'finger_placement_id' => 2,
        ]);

        ChordFingerPlacement::create([
            'chord_id' => 1,
            'finger_placement_id' => 3,
        ]);

        ChordFingerPlacement::create([
            'chord_id' => 1,
            'finger_placement_id' => 4,
        ]);

        ChordFingerPlacement::create([
            'chord_id' => 1,
            'finger_placement_id' => 5,
        ]);

        ChordFingerPlacement::create([
            'chord_id' => 1,
            'finger_placement_id' => 6,
        ]);


    }
}
