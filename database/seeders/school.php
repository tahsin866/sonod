<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;  // Add this line

class SchoolSeeder extends Seeder  // Rename class to follow conventions
{
   
    public function run(): void
    {
        DB::table('School')->insert([  // Add the semicolon here
            [
                'student_id' => '12',
                'school_name' => 'Jamia Arabiya Emdadul Ulum',
              
            ],
            

            [
                'student_id' => '13',
                'school_name' => 'Jamia Arabiya Emdadul Ulum',
              
            ],
            [
                'student_id' => '14',
                'school_name' => 'Jamia Arabiya Emdadul Ulum',
              
            ],
            [
                'student_id' => '15',
                'school_name' => 'Jamia Arabiya Emdadul Ulum',
              
            ],
            [
                'student_id' => '16',
                'school_name' => 'Jamia Arabiya Emdadul Ulum',
              
            ],
          
        ]);  // Add semicolon here to close the statement
    }
}
