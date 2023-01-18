<?php

namespace App\Models;

use App\Models\Chord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    public function chords() {
        return $this->belongsToMany(Chord::class, 'chord_songs');
    }

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
