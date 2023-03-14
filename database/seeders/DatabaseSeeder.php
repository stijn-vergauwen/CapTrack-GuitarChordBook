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
            SongSeeder::class,
            ChordSeeder::class,
            FingerPlacementSeeder::class,
        ]);

    }
}
