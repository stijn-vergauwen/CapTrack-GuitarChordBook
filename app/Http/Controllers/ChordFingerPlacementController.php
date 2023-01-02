<?php

namespace App\Http\Controllers;

use App\Models\Chord;
use Illuminate\Http\Request;
use App\Models\FingerPlacement;
use App\Models\ChordFingerPlacement;

class ChordFingerPlacementController extends Controller
{
    public static function createChordFingerPlacement(array $placementData, int $string, int $chordId) {
        $muteString = isset($placementData['mute_string']);
        $fret = (
            $muteString ?
            0 :
            (int)$placementData['fret']
        );

        $fingerPlacement = FingerPlacement::getOrCreate($string, $fret, $muteString);

        ChordFingerPlacement::create([
            'chord_id' => $chordId,
            'finger_placement_id' => $fingerPlacement->id,
        ]);
    }

    public static function updateFingerPlacementOfChord(Chord $chord, array $stringsData) {
        foreach($chord->fingerPlacements as $fingerPlacement) {
            ChordFingerPlacementController::updateChordFingerPlacement(
                $fingerPlacement,
                $stringsData[$fingerPlacement->string]
            );
        }
    }

    private static function updateChordFingerPlacement(FingerPlacement $fingerPlacement, array $stringData) {
        $muteString = isset($stringData['mute_string']);
        $fret = ($muteString ? 0 : (int)$stringData['fret']);

        ChordFingerPlacement::getByChordAndFingerPlacementId(
            $fingerPlacement->pivot->chord_id,
            $fingerPlacement->pivot->finger_placement_id
        )->updateFingerPlacementId(
            FingerPlacement::getOrCreate($fingerPlacement->string, $fret, $muteString)->id
        );
    }
}
