<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Song;
use App\Models\Chord;
use Illuminate\Http\Request;
use App\Http\Controllers\SongTagController;

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
        $tags = Tag::getAll();

        return view('songs.create', ['chords' => $chords, 'tags' => $tags]);
    }

    public function viewSongEditor(int $id) {
        $song = Song::getById($id);
        $chords = Chord::getAll();
        $selectedChords = $this->arrayToJson($this->collectionToArrayOfIds($song->chords));
        $tags = Tag::getAll();
        $selectedTags = $this->arrayToJson($this->collectionToArrayOfIds($song->tags));

        return view('songs.edit', ['song' => $song, 'chords' => $chords, 'selectedChords' => $selectedChords, 'tags' => $tags, 'selectedTags' => $selectedTags]);
    }

    public function handleCreateSong(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'chords' => 'required',
            'tags' => '',
        ]);

        $this->createSong($request->title, $request->description, $this->jsonToArray($request->chords), $this->jsonToArray($request->tags));

        return redirect(route('songsOverview'));
    }

    public function handleUpdateSong(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'chords' => 'required',
            'tags' => '',
        ]);

        $this->updateSong($request->id, $request->title, $request->description, $this->jsonToArray($request->chords), $this->jsonToArray($request->tags));

        return redirect(route('songInfo', ['id' => $request->id]));
    }

    public function handleDeleteSong(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        $this->deleteSong($request->id);

        return redirect(route('songsOverview'));
    }

    private function createSong(string $title, string $description, array $chordIds, array $tagIds) : Song {
        // dd($chordIds);

        $newSong = Song::create([
            'title' => $title,
            'description' => $description,
        ]);

        $chordSongController = new ChordSongController();
        $chordSongController->createChordsOfSong($newSong->id, $chordIds);

        $songTagController = new SongTagController();
        $songTagController->createTagsOfSong($newSong->id, $tagIds);

        return $newSong;
    }

    private function updateSong(int $id, string $title, string $description, array $requestChords, array $tagIds) {
        $song = Song::getById($id);

        // dd($request->chords);

        $chordSongController = new ChordSongController();
        $chordSongController->updateChordsOfSong($song->id, $this->collectionToArrayOfIds($song->chords), $requestChords);

        $songTagController = new SongTagController();
        $songTagController->updateTagsOfSong($id, $this->collectionToArrayOfIds($song->tags), $tagIds);

        $song->updateValues($title, $description);
    }

    private function deleteSong(int $id) {
        $song = Song::getById($id);

        $chordSongController = new ChordSongController();
        $chordSongController->deleteChordsOfSong($song->id, $this->collectionToArrayOfIds($song->chords));

        $songTagController = new SongTagController();
        $songTagController->deleteAllTagsOfSong($id);

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
