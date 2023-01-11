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
        return view('songs.create');
    }

    public function viewSongEditor(int $id) {
        $song = Song::getById($id);
        $chords = Chord::getAll();

        return view('songs.edit', ['song' => $song, 'chords' => $chords]);
    }

    public function handleCreateSong(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $this->createSong($request->title, $request->description);

        return $this->viewSongsOverview();
    }

    public function handleUpdateSong(Request $request) {
        // dd(json_decode($request->chords));

        $validated = $request->validate([
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $this->updateSong($request->id, $request->title, $request->description);

        return $this->viewSongInfo($validated['id']);
    }

    public function handleDeleteSong(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        $this->deleteSong($request->id);

        return $this->viewSongsOverview();
    }

    private function createSong(string $title, string $description) : Song {
        $newSong = Song::create([
            'title' => $title,
            'description' => $description,
        ]);

        return $newSong;
    }

    private function updateSong(int $id, string $title, string $description) {
        $song = Song::getById($id);
        $song->updateValues($title, $description);
    }

    private function deleteSong(int $id) {
        $song = Song::getById($id);
        $song->delete();
    }
    
}
