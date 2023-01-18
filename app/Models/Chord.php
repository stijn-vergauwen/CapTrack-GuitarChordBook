<?php

namespace App\Models;

use App\Models\Song;
use App\Models\FingerPlacement;
use App\Models\ChordFingerPlacement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chord extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function fingerPlacements() {
        return $this->belongsToMany(FingerPlacement::class, 'chord_finger_placements');
    }

    public function songs() {
        return $this->belongsToMany(Song::class, 'chord_songs');
    }

    // public function chordFingerPlacements() {
    //     return $this->hasMany(ChordFingerPlacement::class);
    // }

    public static function getAll() {
        return Chord::get();
    }

    public static function getById(int $id) : Chord {
        return Chord::findOrFail($id);
    }

    public function updateValues(string $newName, string $newDescription) {
        $this->name = $newName;
        $this->description = $newDescription;

        $this->save();
    }
}
