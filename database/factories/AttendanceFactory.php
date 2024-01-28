<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        static $student = 1;
        return [
            'student_id' => $student++,
            'learn_day_id' =>1, //fake()->numberBetween(1,3)
            'status'=>fake()->numberBetween(1,3),
            
            
        ];
    }
}
