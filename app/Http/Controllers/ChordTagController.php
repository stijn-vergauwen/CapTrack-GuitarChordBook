<?php

namespace App\Http\Controllers;

use App\Models\ChordTag;
use Illuminate\Http\Request;

class ChordTagController extends Controller
{
    public static function createTagsOfChord(int $chordId, array $tagIds) {
        foreach($tagIds as $tagId) {
            ChordTag::Create([
                'chord_id' => $chordId,
                'tag_id' => $tagId
            ]);
        }
    }
}
