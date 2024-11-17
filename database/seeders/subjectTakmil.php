<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class subjectTakmil extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subject_name_takmils')->insert([

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
