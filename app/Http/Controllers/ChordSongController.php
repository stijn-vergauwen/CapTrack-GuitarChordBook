<?php

namespace App\Http\Controllers;

use App\Models\ChordSong;
use Illuminate\Http\Request;

class ChordSongController extends Controller
{
    public function createChordsOfSong(int $songId, array $requestChordIds) {
        // loop through chords param
        // make new chordSong with song id new song, and chord id looped value

        foreach($requestChordIds as $chordId) {
            ChordSong::create([
                'chord_id' => $chordId,
                'song_id' => $songId,
            ]);
        }
    }

    public function updateChordsOfSong(int $songId, array $chordIdsOfSong, array $requestChordIds) {
        // make array chordsToDelete, set to copy of chordsOfSong
        // loop through requestchords array
        // remove chordId from chordsToDelete
        // loop through chordsongs of song
        // if new chord, create chord
        // if unchanged, continue
        // end loops
        // loop through chordIdsToDelete
        // delete chordSong with id

        // dd($chordsOfSong, $requestChordIds);

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
            deleteChordSongById($songId, $chordId);
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
