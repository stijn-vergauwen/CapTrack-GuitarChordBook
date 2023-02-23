<?php

namespace App\Models;

use App\Models\Song;
use App\Models\Chord;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function chords() {
        return $this->belongsToMany(Chord::class, 'chord_tags');
    }

    public function songs() {
        return $this->belongsToMany(Song::class, 'song_tags');
    }

    public static function getAll() {
        return Tag::get();
    }

    public static function getById(int $id) : Tag {
        return Tag::findOrFail($id);
    }

    public function updateValues(string $newName) {
        $this->name = $newName;

        $this->save();
    }
}
