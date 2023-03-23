<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Chord;
use Illuminate\Http\Request;
use App\Models\FingerPlacement;
use App\Models\ChordFingerPlacement;
use App\Http\Controllers\ChordTagController;
use App\Http\Controllers\ChordFingerPlacementController;

class ChordController extends Controller
{
    public function viewChordsOverview() {
        $chords = Chord::getAll();

        return view('chords.overview', ['chords' => $chords]);
    }

    public function viewChordInfo(int $id) {
        $chord = Chord::getById($id);
        $chord->increaseViewCount();

        return view('chords.info', ['chord' => $chord]);
    }
    
    public function viewChordCreator() {
        $tags = Tag::getAll();

        return view('chords.create', ['tags' => $tags]);
    }

    public function viewChordEditor(int $id) {
        $chord = Chord::getById($id);
        $tags = Tag::getAll();
        $selectedTags = $this->arrayToJson($this->collectionToArrayOfIds($chord->tags));

        return view('chords.edit', ['chord' => $chord, 'tags' => $tags, 'selectedTags' => $selectedTags]);
    }

    public function handleCreateChord(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'strings' => 'required',
            'tags' => '',
        ]);

        $this->createChord($request->name, $request->description, $request->strings, $this->jsonToArray($request->tags));

        return redirect(route('chordsOverview'));
    }

    public function handleUpdateChord(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'strings' => 'required',
            'tags' => '',
        ]);

        $this->updateChord($request->id, $request->name, $request->description, $request->strings, $this->jsonToArray($request->tags));

        return redirect(route('chordInfo', ['id' => $request->id]));
    }

    public function handleDeleteChord(Request $request) {
        $validated = $request->validate([
            'id' => 'required',
        ]);

        $this->deleteChord($request->id);

        return redirect(route('chordsOverview'));
    }

    private function createChord(string $name, string $description, array $strings, array $tagIds) : Chord {
        $newChord = Chord::create([
            'name' => $name,
            'description' => $description,
        ]);

        foreach($strings as $index => $placementData) {
            ChordFingerPlacementController::createChordFingerPlacement($placementData, $index, $newChord->id);
        }

        $chordTagController = new ChordTagController();
        $chordTagController->createTagsOfChord($newChord->id, $tagIds);

        return $newChord;
    }

    private function updateChord(int $id, string $name, string $description, array $strings, array $tagIds) {
        $chord = Chord::getById($id);
        $chord->updateValues($name, $description);
        
        ChordFingerPlacementController::updateFingerPlacementOfChord($chord, $strings);

        $chordTagController = new ChordTagController();
        $chordTagController->updateTagsOfChord($id, $this->collectionToArrayOfIds($chord->tags), $tagIds);
    }

    private function deleteChord(int $id) {
        $chord = Chord::getById($id);

        ChordFingerPlacementController::deleteFingerPlacementOfChord($id);

        // TODO: delete chordSong entries with this chord

        $chordTagController = new ChordTagController();
        $chordTagController->deleteAllTagsOfChord($id);

        $chord->delete();
    }


    // Utility

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
