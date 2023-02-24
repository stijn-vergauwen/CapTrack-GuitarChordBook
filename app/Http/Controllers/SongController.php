<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Chord;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function viewSongsOverview() {
        $songs = Song::getAll();

        return view('songs.overview', ['songs' => $songs]);
    }

    public function viewSongInfo(int $id) {
        $song = Song::getById($id);

        return view('songs.info', ['song' => $song]);
    }
    
    public function viewSongCreator() {
        $chords = Chord::getAll();

        return view('songs.create', ['chords' => $chords]);
    }

    public function viewSongEditor(int $id) {
        $song = Song::getById($id);
        $chords = Chord::getAll();
        $selectedChords = $this->arrayToJson($this->collectionToArrayOfIds($song->chords));

        return view('songs.edit', ['song' => $song, 'chords' => $chords, 'selectedChords' => $selectedChords]);
    }

    public function handleCreateSong(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'chords' => 'required',
        ]);

        // dd($request->chords);

        $this->createSong($request->title, $request->description, $this->jsonToArray($request->chords));

        return $this->viewSongsOverview();
    }

    public function handleUpdateSong(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'chords' => 'required',
        ]);

        $this->updateSong($request->id, $request->title, $request->description, $this->jsonToArray($request->chords));

        return $this->viewSongInfo($validated['id']);
    }

    public function handleDeleteSong(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        $this->deleteSong($request->id);

        return $this->viewSongsOverview();
    }

    private function createSong(string $title, string $description, array $chords) : Song {
        // dd($chords);

        $newSong = Song::create([
            'title' => $title,
            'description' => $description,
        ]);

        $chordSongController = new ChordSongController();
        $chordSongController->createChordsOfSong($newSong->id, $chords);

        return $newSong;
    }

    private function updateSong(int $id, string $title, string $description, array $requestChords) {
        $song = Song::getById($id);

        // dd($request->chords);

        $chordSongController = new ChordSongController();
        $chordSongController->updateChordsOfSong($song->id, $this->collectionToArrayOfIds($song->chords), $requestChords);

        $song->updateValues($title, $description);
    }

    private function deleteSong(int $id) {
        $song = Song::getById($id);

        $chordSongController = new ChordSongController();
        $chordSongController->deleteChordsOfSong($song->id, $this->collectionToArrayOfIds($song->chords));

        $song->delete();
    }

    // TODO: these utility methods are not controller specific, a general version as service for all controllers would be epic

    private function jsonToArray(string $inputJson) : array {
        return json_decode($inputJson) ?? [];
    }

    private function arrayToJson(array $inputArray) : string {
        return json_encode($inputArray);
    }

    private function collectionToArrayOfIds($inputCollection) : array {
        $itemIds = [];

        foreach($inputCollection as $item) {
            array_push($itemIds, $item->id);
        }

        return $itemIds;
    }
    
}
