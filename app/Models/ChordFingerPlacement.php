<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChordFingerPlacement extends Model
{
    use HasFactory;

    protected $fillable = [
        'chord_id',
        'finger_placement_id',
    ];

    public static function getAll() {
        return ChordFingerPlacement::get();
    }

    public static function getById(int $id) {
        return ChordFingerPlacement::findOrFail($id);
    }

    public static function getByChordId(int $chordId) {
        return ChordFingerPlacement::where('chord_id', $chordId)->get();
    }
}
