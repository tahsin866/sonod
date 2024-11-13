<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Concerns\Fallback;

class school extends Model
{
  
use HasFactory;

protected $fillable = ['School_name','student_id'];

public function student(){

    return $this->belongsTo(Student::class);
}

}
