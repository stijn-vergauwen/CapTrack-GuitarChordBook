<?php

namespace Tests\Feature;

use App\Models\Chord;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChordOverviewTest extends TestCase
{
    use RefreshDatabase;

    public function test_chord_overview_page_can_render() {
        $response = $this->get('/chords');

        $response->assertStatus(200);
    }

    public function test_page_displays_chords() {
        $chords = Chord::factory(2)->create();

        $view = $this->view('chords.overview', ['chords' => $chords]);

        $view->assertSee('Chord Book');
        $view->assertSee('Add new chord');
        $view->assertSee($chords->first()->name);
    }
}
