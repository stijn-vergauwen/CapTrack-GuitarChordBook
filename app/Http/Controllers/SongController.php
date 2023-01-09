<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function viewSongsOverview() {
        $songs = $this->getAllSongs();

        return view('songs.overview', ['songs' => $songs]);
    }

    public function viewSongInfo(int $id) {
        $song = $this->getSongById($id);

        return view('songs.info', ['song' => $song]);
    }
    
    public function viewSongCreator() {
        return view('songs.create');
    }

    public function viewSongEditor(int $id) {
        $song = $this->getSongById($id);

        return view('songs.edit', ['song' => $song]);
    }

    public function handleCreateSong(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $this->createSong($validated['title'], $validated['description']);

        return $this->viewSongsOverview();
    }

    private function getAllSongs() {
        return Song::get();
    }

    private function getSongById(int $id) : Song {
        return Song::findOrFail($id);
    }

    private function createSong(string $title, string $description) : Song {
        $newSong = Song::create([
            'title' => $title,
            'description' => $description,
        ]);

        return $newSong;
    }
    
}
