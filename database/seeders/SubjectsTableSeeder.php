<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    public function run()
    {
        // Insert dummy data for subjects table
        DB::table('subjects')->insert([
            [
                'student_id' => 12,  // Corresponding student_id
                'name' => 'Mathematics',
                'marks' => 85,
          

            ],
            [
                'student_id' => 13,
                'name' => 'Science',
                'marks' => 90,
            ],
            [
                'student_id' => 14,
                'name' => 'English',
                'marks' => 88,
            ],
            [
                'student_id' => 15,
                'name' => 'History',
                'marks' => 72,
            ],
            [
                'student_id' => 16,
                'name' => 'Geography',
                'marks' => 95,
            ],
        ]);
    }
}
