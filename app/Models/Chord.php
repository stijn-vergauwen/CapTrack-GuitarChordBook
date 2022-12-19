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
}
