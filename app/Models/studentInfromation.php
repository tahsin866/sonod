<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class studentInfromation extends Model
{
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
'created_at',
'updated_at',

    ];
}
