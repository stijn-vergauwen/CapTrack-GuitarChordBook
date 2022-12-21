<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChordController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::controller(ChordController::class)->group(function () {
    Route::get('/chords', 'viewChordsOverview')->name('chordOverview');
    Route::get('/chords/info/{id}','viewChordInfo')->name('chordInfo');

    Route::get('/chords/create','viewChordCreator')->name('chordCreator');

    Route::get('/chords/edit/{id}','viewChordEditor')->name('chordEditor');
    
    Route::post('/chords/create','createChord')->name('chord.create');
    Route::post('/chords/edit','updateChord')->name('chord.edit');
    Route::post('/chords/delete','deleteChord')->name('chord.delete');
});
