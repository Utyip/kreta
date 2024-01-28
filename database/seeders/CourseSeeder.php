<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        \App\Models\Course::factory()->create([
            'name' => 'OKJ',
        ]);
        \App\Models\Course::factory()->create([
            'name' => '11. evf.',
        ]);
        \App\Models\Course::factory()->create([
            'name' => '12. evf.',
        ]);

   
    }
}
