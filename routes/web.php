<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChordController;

Route::get('/', function () {
    return view('home');
});


Route::get('/chords/create', [ChordController::class, 'viewChordCreator']);
Route::post('/chords/create', [ChordController::class, 'createChord']);
