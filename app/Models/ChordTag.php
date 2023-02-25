<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChordTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'chord_id',
        'tag_id',
    ];

    public static function getAll() {
        return ChordTag::get();
    }

    public static function getById(int $id) {
        return ChordTag::findOrFail($id);
    }

    public static function getByForeignIds(int $chordId, int $tagId) {
        return ChordTag::where('chord_id', $chordId)->where('tag_id', $tagId)->first();
    }

    public static function getByChordId(int $chordId) {
        return ChordTag::where('chord_id', $chordId)->get();
    }
}
