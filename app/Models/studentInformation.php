<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class studentInformation extends Model
{
    // Define the table name if it differs from the default
    // protected $table = 'student_informations';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'Student_name_bn',
        'Student_name_en',
        'Student_name_ar',
        'stu_father_name_bn',
        'stu_father_name_en',
        'stu_father_name_ar',
        'stu_mother_name_bn',
        'stu_mother_name_en',
        'stu_mother_name_ar',
        'Nationality',
        'date_of_birth',
        'Roll',
        'reg_id',
        'madrasha_id',
    ];
}
