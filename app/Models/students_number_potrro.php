<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class students_number_potrro extends Model
{
    // Specify the table name if it doesn't follow Laravel's naming conventions
    protected $table = 'students_number_potrro';

    // Define fillable attributes for mass assignment
    // protected $fillable = ['name', 'Roll', 'reg_id', 'years', 'SRtype'];

    // Disable timestamps if not present in the table
    public $timestamps = false;
}
