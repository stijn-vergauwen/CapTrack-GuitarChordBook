<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Song;
use App\Models\Chord;
use App\Models\FingerPlacement;
use Database\Seeders\TagSeeder;
use Illuminate\Database\Seeder;
use App\Models\ChordFingerPlacement;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            TagSeeder::class,
        ]);


        Chord::create([
            'name' => 'C',
            'description' => 'Beginner C chord',
        ]);

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








        // dummy data generation, but these chords don't make sense so i don't want to use it atm

        Chord::factory(6)->create();

        Song::factory(4)->create();

        // FingerPlacement::factory(10)->create();

        // ChordFingerPlacement::create([
        //     'chord_id' => 1,
        //     'finger_placement_id' => 1,
        // ]);

        // ChordFingerPlacement::create([
        //     'chord_id' => 1,
        //     'finger_placement_id' => 2,
        // ]);

        // ChordFingerPlacement::create([
        //     'chord_id' => 1,
        //     'finger_placement_id' => 3,
        // ]);

        // ChordFingerPlacement::create([
        //     'chord_id' => 1,
        //     'finger_placement_id' => 4,
        // ]);

        // ChordFingerPlacement::create([
        //     'chord_id' => 1,
        //     'finger_placement_id' => 5,
        // ]);

        // ChordFingerPlacement::create([
        //     'chord_id' => 1,
        //     'finger_placement_id' => 6,
        // ]);
    }
}
