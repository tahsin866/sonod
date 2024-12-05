<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class students_number_potrro extends Model
{
    protected $table = 'students_number_potrro';
    protected $primaryKey = 'IDs';
    public $incrementing = false;
    public $timestamps = false;
    // Define composite primary keys


    protected $fillable = [
        'Name',
        'Father',
        'DateofBirth',
        'Madrasha',
        'st_en_name',
        'FatherEnglish',
        'BirthRegistrationNo',
        'MobileNo',
        'AlternativeMobile'
    ];

    public static function findByRollAndRegId($roll, $reg_id)
    {
        return self::where([
            'Roll' => $roll,
            'reg_id' => $reg_id,
            'CID' => 2
        ])->first();
    }
}



