<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // public function search(Request $request)
    // {
    //     $roll = $request->get('roll_number');
    //     $year = $request->get('year');

    //     // Find the student by roll and year (you may need to adjust based on your DB structure)
    //     $student = Student::where('roll_number', $roll)
    //         ->where('year', $year)
    //         ->first();

    //     if ($student) {
    //         return response()->json([
    //             'student' => $student,
    //         ]);
    //     } else {
    //         return response()->json([
    //             'message' => 'Student not found.',
    //         ], 404);
    //     }
    // }


    public function search(Request $request)
    {
        // Retrieve the query parameters for searching
        $rollNumber = $request->input('roll_number');
        $year = $request->input('year');
    
        // Perform a search query on the students table
        $students = Student::query()
            ->with('subjects') // Eager load the subjects
            ->when($rollNumber, function ($query) use ($rollNumber) {
                $query->where('roll_number', 'LIKE', "%$rollNumber%");
            })
            ->when($year, function ($query) use ($year) {
                $query->where('year', '=', $year);
            })
            ->get();
    
        // Check if any student found
        if ($students->isEmpty()) {
            return response()->json(['message' => 'No student found'], 404);
        }
    
        return response()->json($students); // Return the students with their subjects
    }

}
