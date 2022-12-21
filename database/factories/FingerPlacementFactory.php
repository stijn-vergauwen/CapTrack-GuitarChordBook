<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FingerPlacement>
 */
class FingerPlacementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $isMuted = random_int(0, 10) > 6;

        return [
            'string' => fake()->numberBetween(1, 6),
            'fret' => $isMuted ? 0 : fake()->randomDigit(),
            'mute_string' => $isMuted,
        ];
    }
}
