<?php

namespace Database\Seeders;

use App\Models\Chord;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Chord::create([
            'name' => 'C',
            'description' => 'Beginner C chord',
        ]);

        Chord::factory(6)->create();
    }
}
