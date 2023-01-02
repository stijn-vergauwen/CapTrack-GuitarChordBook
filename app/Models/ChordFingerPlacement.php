<?php

namespace App\Models;

use App\Models\Chord;
use App\Models\FingerPlacement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChordFingerPlacement extends Model
{
    use HasFactory;

    protected $fillable = [
        'chord_id',
        'finger_placement_id',
    ];

    // public function chord() {
    //     return $this->belongsTo(Chord::class);
    // }

    // public function fingerPlacement() {
    //     return $this->belongsTo(FingerPlacement::class);
    // }

    public static function getAll() {
        return ChordFingerPlacement::get();
    }

    public static function getById(int $id) {
        return ChordFingerPlacement::findOrFail($id);
    }

    public static function getByChordAndFingerPlacementId(int $chordId, int $fingerPlacementId) : ChordFingerPlacement {
        return ChordFingerPlacement::where('chord_id', $chordId)->where('finger_placement_id', $fingerPlacementId)->first();
    }

    public function updateFingerPlacementId(int $newId) {
        $this->finger_placement_id = $newId;
        
        $this->save();
    }
}
