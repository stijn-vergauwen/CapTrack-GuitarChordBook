<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChordSong extends Model
{
    use HasFactory;

    protected $fillable = [
        'chord_id',
        'song_id',
    ];

    public static function getAll() {
        return ChordSong::get();
    }

    public static function getById(int $id) {
        return ChordSong::findOrFail($id);
    }

    public static function getBySongAndChordId(int $songId, int $chordId) : ChordSong {
        return ChordSong::where('song_id', $songId)->where('chord_id', $chordId)->first();
    }

    public function updateChordId(int $newId) {
        $this->chord_id = $newId;
        
        $this->save();
    }

}
