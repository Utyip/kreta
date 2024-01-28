<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
         $this->call([
            CourseSeeder::class,
            StudentSeeder::class,
            LearnDaySeeder::class ,    
            AttendanceSeeder::class,
         ]);
         \App\Models\User::factory()->create([
             'name' => 'asd',
             'email' => 'asd@asd.asd',
             'password' => 1234,

         ]);
    }
}
