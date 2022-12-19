<?php

namespace App\Http\Controllers;

use App\Models\Chord;
use Illuminate\Http\Request;

class ChordController extends Controller
{
    public function viewChordCreator() {
        return view('chords.create');
    }

    public function viewChords() {
        $chords = Chord::getAll();

        return view('chords.overview', ['chords' => $chords]);
    }

    public function createChord(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Chord::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        return back();
    }
}
