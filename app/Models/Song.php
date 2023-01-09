<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    public static function getAll() {
        return Song::get();
    }

    public static function getById(int $id) : Song {
        return Song::findOrFail($id);
    }

    public function updateValues(string $newTitle, string $newDescription) {
        $this->title = $newTitle;
        $this->description = $newDescription;

        $this->save();
    }
}
