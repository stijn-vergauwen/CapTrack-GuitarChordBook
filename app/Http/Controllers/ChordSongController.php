<?php

namespace App\Http\Controllers;

use App\Models\ChordSong;
use Illuminate\Http\Request;

class ChordSongController extends Controller
{
    public function createChordsOfSong(int $songId, array $requestChordIds) {
        foreach($requestChordIds as $chordId) {
            ChordSong::create([
                'chord_id' => $chordId,
                'song_id' => $songId,
            ]);
        }
    }

    public function updateChordsOfSong(int $songId, array $chordIdsOfSong, array $requestChordIds) {
        $chordSongIdsToDelete = $chordIdsOfSong;

        foreach($requestChordIds as $requestChordId) {
            $this->removeIdFromArray($chordSongIdsToDelete, $requestChordId);

            if(!$this->checkIdInArray($chordIdsOfSong, $requestChordId)) {
                ChordSong::create([
                    'chord_id' => $requestChordId,
                    'song_id' => $songId,
                ]);
            }
        }

        foreach($chordSongIdsToDelete as $idToDelete) {
            $this->deleteChordSongById($songId, $idToDelete);
        }
    }

    public function deleteChordsOfSong(int $songId, array $chordIdsOfSong) {
        foreach($chordIdsOfSong as $chordId) {
            $this->deleteChordSongById($songId, $chordId);
        }
    }

    private function deleteChordSongById(int $songId, int $chordId) {
        $chordSong = ChordSong::getBySongAndChordId($songId, $chordId);
        if($chordSong != null) {
            $chordSong->delete();
        }
    }

    private function removeIdFromArray(&$idArray, $idToRemove) {
        $indexToRemove = -1;
        foreach($idArray as $index => $id) {
            if($id == $idToRemove) {
                $indexToRemove = $index;
                break;
            }
        }
        if($indexToRemove != -1) {
            array_splice($idArray, $indexToRemove, 1);
        }
    }

    private function checkIdInArray($array, $idToCheck) {
        foreach($array as $item) {
            if($item == $idToCheck) return true;
        }
        return false;
    }
}
