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
            'name' => 'Major chord'
        ]);
        
        Tag::create([
            'name' => 'Minor chord'
        ]);

        Tag::create([
            'name' => 'Barre chord'
        ]);

        Tag::create([
            'name' => 'Open chord'
        ]);
    }
}
