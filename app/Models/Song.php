<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    public function updateValues(string $newTitle, string $newDescription) {
        $this->title = $newTitle;
        $this->description = $newDescription;

        $this->save();
    }
}
