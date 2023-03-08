<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'Major'
        ]);
        
        Tag::create([
            'name' => 'Minor'
        ]);

        Tag::create([
            'name' => 'Barre'
        ]);

        Tag::create([
            'name' => 'Open'
        ]);
    }
}
