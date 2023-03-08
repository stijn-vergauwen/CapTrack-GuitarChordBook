<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'song_id',
        'tag_id',
    ];

    public static function getAll() {
        return SongTag::get();
    }

    public static function getById(int $id) {
        return SongTag::findOrFail($id);
    }

    public static function getByForeignIds(int $songId, int $tagId) {
        return SongTag::where('song_id', $songId)->where('tag_id', $tagId)->first();
    }

    public static function getBySongId(int $songId) {
        return SongTag::where('song_id', $songId)->get();
    }
}
