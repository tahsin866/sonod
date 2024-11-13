<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        // Insert dummy data for students table with unique roll numbers
        DB::table('students')->insert([
            [
                'name' => 'John Doe',
                'roll_number' => '20',  // Unique roll number
                'year' => 2023,
                'class' => 10
            ],
            [
                'name' => 'Jane Smith',
                'roll_number' => '21',
                'year' => 2023,
                'class' => 10
            ],
            [
                'name' => 'Sam Wilson',
                'roll_number' => '22',
                'year' => 2023,
                'class' => 10
            ],
            [
                'name' => 'Emily Johnson',
                'roll_number' => '23',
                'year' => 2023,
                'class' => 10
            ],
            [
                'name' => 'Michael Brown',
                'roll_number' => '24',
                'year' => 2023,
                'class' => 10
            ]
        ]);
    }
}
