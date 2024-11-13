<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'roll_number', 'class', 'year'];

    // Define the relationship with the Subject model (One-to-Many)
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
