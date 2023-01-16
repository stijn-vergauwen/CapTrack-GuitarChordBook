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

        return view('songs.info', ['song' => $song, 'selectedChords' => $song->chords]);
    }
    
    public function viewSongCreator() {
        $chords = Chord::getAll();

        return view('songs.create', ['allChords' => $chords]);
    }

    public function viewSongEditor(int $id) {
        $song = Song::getById($id);
        $allChords = Chord::getAll();
        $selectedChords = $this->getChordIdsAsString($song->chords);

        return view('songs.edit', ['song' => $song, 'allChords' => $allChords, 'selectedChords' => $selectedChords]);
    }

    public function handleCreateSong(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'chords' => 'required',
        ]);

        // dd($request->chords);

        $this->createSong($request->title, $request->description, $this->requestChordsToArray($request->chords));

        return $this->viewSongsOverview();
    }

    public function handleUpdateSong(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'chords' => 'required',
        ]);

        $this->updateSong($request->id, $request->title, $request->description, $this->requestChordsToArray($request->chords));

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
        $chordSongController->updateChordsOfSong($song->id, $this->getCollectionIdsAsArray($song->chords), $requestChords);

        $song->updateValues($title, $description);
    }

    private function deleteSong(int $id) {
        // get chordsongs by song id
        // delete them

        $song = Song::getById($id);

        $chordSongController = new ChordSongController();
        $chordSongController->deleteChordsOfSong($song->id, $this->getCollectionIdsAsArray($song->chords));

        $song->delete();
    }

    private function requestChordsToArray(string $chordsJson) : array {
        return json_decode($chordsJson) ?? [];
    }

    private function getChordIdsAsString($chords) : string {
        $chordIds = [];
        foreach($chords as $chord) {
            array_push($chordIds, $chord->id);
        }
        return json_encode($chordIds);
    }

    private function getCollectionIdsAsArray($inputCollection) : array {
        $ids = [];

        foreach($inputCollection as $item) {
            array_push($ids, $item->id);
        }

        return $ids;
    }
    
}
