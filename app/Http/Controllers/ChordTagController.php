<?php

namespace App\Http\Controllers;

use App\Models\ChordTag;
use Illuminate\Http\Request;

class ChordTagController extends Controller
{
    public function createTagsOfChord(int $chordId, array $tagIds) {
        foreach($tagIds as $tagId) {
            ChordTag::Create([
                'chord_id' => $chordId,
                'tag_id' => $tagId
            ]);
        }
    }

    public function updateTagsOfChord(int $chordId, array $currentTagIds, array $newTagIds) {
        $tagIdsToCreate = $this->filterDuplicates($newTagIds, $currentTagIds);
        $tagIdsToDelete = $this->filterDuplicates($currentTagIds, $newTagIds);

        $this->createTagsOfChord($chordId, $tagIdsToCreate);
        $this->deleteTagsOfChord($chordId, $tagIdsToDelete);
    }

    public function deleteAllTagsOfChord(int $chordId) {
        $chordTagsToDelete = ChordTag::getByChordId($chordId);
        foreach($chordTagsToDelete as $chordTag) {
            $chordTag->delete();
        }
    }

    private function deleteTagsOfChord(int $chordId, array $tagIdsToDelete) {
        foreach($tagIdsToDelete as $tagIdToDelete) {
            $this->deleteChordTag($chordId, $tagIdToDelete);
        }
    }

    private function deleteChordTag(int $chordId, int $tagId) {
        $chordTag = ChordTag::getByForeignIds($chordId, $tagId);
        if($chordTag != null) {
            $chordTag->delete();
        }
    }

    private function filterDuplicates(array $filterArray, array $checkArray) {
        $result = [];

        foreach($filterArray as $filterItem) {
            if(!$this->arrayContains($checkArray, $filterItem)) {
                array_push($result, $filterItem);
            }
        }

        return $result;
    }

    private function arrayContains(array $array, $checkItem) : bool {
        foreach($array as $item) {
            if($item == $checkItem) return true;
        }
        return false;
    }
}
