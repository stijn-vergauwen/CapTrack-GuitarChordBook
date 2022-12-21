<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chord extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public static function getAll() {
        return Chord::get();
    }

    public static function getById(int $id) {
        return Chord::findOrFail($id);
    }

    public function updateValues(string $newName, string $newDescription) {
        $this->name = $newName;
        $this->description = $newDescription;

        $this->save();
    }
}
