<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{

    protected $fillable = ['name', 'madrasha_id'];
    // A school can have many students
    public function students()
    {
        return $this->belongsTo(Student::class, 'madrasha_id');  // 'madrasha_id' in students table is the foreign key
    }
}
