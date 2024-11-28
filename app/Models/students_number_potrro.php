<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class students_number_potrro extends Model
{
    // Specify the table name if it doesn't follow Laravel's naming conventions
    protected $table = 'students_number_potrro';



    // protected $fillable = [
    //     'Name',
    //     'NameEn',
    //     'NameAr',
    //     'Father',
    //     'FatherEn',
    //     'FatherAr',
    //     'Mother',
    //     'MotherEn',
    //     'MotherAr',
    //     'Phone',
    //     'NID',
    //     'DateofBirth',
    //     'Madrasha',
    //     'Class',
    //     'Roll',
    //     'reg_id'
    // ];

    protected $primaryKey = 'Roll';  // Set the primary key to 'Roll'
    public $incrementing = false;    // Disable auto-incrementing
    protected $keyType = 'string';   // Set the key type if Roll is string

    protected $fillable = [
        'Name',
        'Father',
        'DateofBirth',
        'Madrasha',
        'reg_id'
    ];


    public function scopeFindByCompositeKey($query, $roll, $reg_id)
    {
        return $query->where('Roll', $roll)->where('reg_id', $reg_id);
    }
    // Define fillable attributes for mass assignment
    // protected $fillable = ['name', 'Roll', 'reg_id', 'years', 'SRtype'];
    // protected $fillable = ['name', 'father_name','Roll'];// Add all necessary fields
    // Disable timestamps if not present in the table
    public $timestamps = false;
}


