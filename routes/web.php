<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ChordController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::controller(ChordController::class)->group(function () {
    Route::get('/chords', 'viewChordsOverview')->name('chordsOverview');
    Route::get('/chords/info/{id}','viewChordInfo')->name('chordInfo');

    Route::get('/chords/create','viewChordCreator')->name('chordCreator');

    Route::get('/chords/edit/{id}','viewChordEditor')->name('chordEditor');
    
    Route::post('/chords/create','createChord')->name('chord.create');
    Route::post('/chords/edit','updateChord')->name('chord.edit');
    Route::post('/chords/delete','deleteChord')->name('chord.delete');
});

Route::controller(SongController::class)->group(function () {
    Route::get('/songs', 'viewSongsOverview')->name('songsOverview');
    // Route::get('/chords/info/{id}','viewChordInfo')->name('chordInfo');

    Route::get('/songs/create','viewSongCreator')->name('songCreator');

    // Route::get('/chords/edit/{id}','viewChordEditor')->name('chordEditor');
    
    Route::post('/songs/create','createSong')->name('song.create');
    // Route::post('/chords/edit','updateChord')->name('chord.edit');
    // Route::post('/chords/delete','deleteChord')->name('chord.delete');
});
