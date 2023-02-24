<?php

namespace App\Http\Controllers;

use App\Models\Chord;
use Illuminate\Http\Request;
use App\Models\FingerPlacement;
use App\Models\ChordFingerPlacement;
use App\Http\Controllers\ChordFingerPlacementController;
use App\Models\Tag;

class ChordController extends Controller
{
    public function viewChordsOverview() {
        $chords = Chord::getAll();

        return view('chords.overview', ['chords' => $chords]);
    }

    public function viewChordInfo(int $id) {
        $chord = Chord::getById($id);

        return view('chords.info', ['chord' => $chord]);
    }
    
    public function viewChordCreator() {
        return view('chords.create');
    }

    public function viewChordEditor(int $id) {
        $chord = Chord::getById($id);
        // $tags = Tag::getAll();
        // $selectedTags = 

        return view('chords.edit', ['chord' => $chord]);
    }

    public function handleCreateChord(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'strings' => 'required',
        ]);

        $this->createChord($request->name, $request->description, $request->strings);

        return $this->viewChordsOverview();
    }

    public function handleUpdateChord(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'strings' => 'required',
        ]);

        $this->updateChord($request->id, $request->name, $request->description, $request->strings);

        return $this->viewChordInfo($validated['id']);
    }

    public function handleDeleteChord(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        $this->deleteChord($request->id);

        return $this->viewChordsOverview();
    }

    private function createChord(string $name, string $description, array $strings) : Chord {
        $newChord = Chord::create([
            'name' => $name,
            'description' => $description,
        ]);

        foreach($strings as $index => $placementData) {
            ChordFingerPlacementController::createChordFingerPlacement($placementData, $index, $newChord->id);
        }

        return $newChord;
    }

    private function updateChord(int $id, string $name, string $description, array $strings) {
        $chord = Chord::getById($id);
        $chord->updateValues($name, $description);
        
        ChordFingerPlacementController::updateFingerPlacementOfChord($chord, $strings);
    }

    private function deleteChord(int $id) {
        $chord = Chord::getById($id);

        ChordFingerPlacementController::deleteFingerPlacementOfChord($id);

        // TODO: delete chordSong entries with this chord

        $chord->delete();
    }
}
