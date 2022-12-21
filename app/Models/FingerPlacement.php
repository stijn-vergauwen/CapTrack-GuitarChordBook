<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FingerPlacement extends Model
{
    use HasFactory;

    protected $fillable = [
        'string',
        'fret',
        'mute_string',
    ];

    public static function getAll() {
        return FingerPlacement::get();
    }

    public static function getById(int $id) {
        return FingerPlacement::findOrFail($id);
    }

    public function updateValues(string $string, string $fret, string $mute_string) {
        $this->string = $string;
        $this->fret = $fret;
        $this->mute_string = $mute_string;

        $this->save();
    }
}
