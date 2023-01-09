<?php

namespace App\Http\Controllers;

use App\Models\Chord;
use Illuminate\Http\Request;
use App\Models\FingerPlacement;
use App\Models\ChordFingerPlacement;
use App\Http\Controllers\ChordFingerPlacementController;

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

        return view('chords.edit', ['chord' => $chord]);
    }

    public function createChord(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'strings' => 'required',
        ]);

        $newChord = Chord::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        foreach($validated['strings'] as $index => $placementData) {
            ChordFingerPlacementController::createChordFingerPlacement($placementData, $index, $newChord->id);
        }

        return $this->viewChordsOverview();
    }

    public function updateChord(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'strings' => 'required',
        ]);

        $chord = Chord::getById($validated['id']);
        $chord->updateValues($validated['name'], $validated['description']);
        
        ChordFingerPlacementController::updateFingerPlacementOfChord($chord, $validated['strings']);

        return $this->viewChordInfo($validated['id']);
    }

    public function deleteChord(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        $chord = Chord::getById($validated['id']);

        ChordFingerPlacementController::deleteFingerPlacementOfChord($chord->id);
        $chord->delete();

        return $this->viewChordsOverview();
    }
}
