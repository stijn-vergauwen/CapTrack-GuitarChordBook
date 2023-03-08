<?php

namespace App\Http\Controllers;

use App\Models\SongTag;
use Illuminate\Http\Request;

class SongTagController extends Controller
{
    
    public function createTagsOfSong(int $songId, array $tagIds) {
        foreach($tagIds as $tagId) {
            SongTag::Create([
                'song_id' => $songId,
                'tag_id' => $tagId
            ]);
        }
    }

    public function updateTagsOfSong(int $songId, array $currentTagIds, array $newTagIds) {
        $tagIdsToCreate = $this->filterDuplicates($newTagIds, $currentTagIds);
        $tagIdsToDelete = $this->filterDuplicates($currentTagIds, $newTagIds);

        $this->createTagsOfSong($songId, $tagIdsToCreate);
        $this->deleteTagsOfSong($songId, $tagIdsToDelete);
    }

    public function deleteAllTagsOfSong(int $songId) {
        $songTagsToDelete = SongTag::getBySongId($songId);
        foreach($songTagsToDelete as $songTag) {
            $songTag->delete();
        }
    }

    private function deleteTagsOfSong(int $songId, array $tagIdsToDelete) {
        foreach($tagIdsToDelete as $tagIdToDelete) {
            $this->deleteSongTag($songId, $tagIdToDelete);
        }
    }

    private function deleteSongTag(int $songId, int $tagId) {
        $songTag = SongTag::getByForeignIds($songId, $tagId);
        if($songTag != null) {
            $songTag->delete();
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
