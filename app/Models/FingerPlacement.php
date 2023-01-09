<?php

namespace App\Models;

use App\Models\Chord;
use App\Models\ChordFingerPlacement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FingerPlacement extends Model
{
    use HasFactory;

    protected $fillable = [
        'string',
        'fret',
        'mute_string',
    ];

    public function chords() {
        return $this->belongsToMany(Chord::class, 'chord_finger_placements');
    }

    // public function chordFingerPlacements() {
    //     return $this->hasMany(ChordFingerPlacement::class);
    // }

    public static function getAll() {
        return FingerPlacement::get();
    }

    public static function getById(int $id) : FingerPlacement {
        return FingerPlacement::findOrFail($id);
    }

    public static function getOrCreate(int $string, int $fret, bool $muteString) : FingerPlacement {
        return FingerPlacement::firstOrCreate([
            'string' => $string,
            'fret' => $fret,
            'mute_string' => $muteString,
        ]);
    }

    public function updateValues(string $string, string $fret, string $mute_string) {
        $this->string = $string;
        $this->fret = $fret;
        $this->mute_string = $mute_string;

        $this->save();
    }
}
