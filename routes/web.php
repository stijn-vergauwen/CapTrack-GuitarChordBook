<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChordController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/chords', [ChordController::class, 'viewChords'])->name('chord.view');

Route::get('/chords/create', [ChordController::class, 'viewChordCreator'])->name('chordCreator');
Route::post('/chords/create', [ChordController::class, 'createChord'])->name('chord.create');
