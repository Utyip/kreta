<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LearnDay>
 */
class LearnDayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'title' =>fake()->name(),
                'date'=>'2024-01-22',
                'course_id' => fake()->numberBetween(1, 3),
            ];
    }
}
