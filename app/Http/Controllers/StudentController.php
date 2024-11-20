<?php

namespace App\Http\Controllers;
use App\Models\studentInformation;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'Student_name_bn' => 'required|string|max:255',
            'Student_name_en' => 'required|string|max:255',
            'Student_name_ar' => 'required|string|max:255',
            'stu_father_name_bn' => 'required|string|max:255',
            'stu_father_name_en' => 'required|string|max:255',
            'stu_father_name_ar' => 'required|string|max:255',
            'stu_mother_name_bn' => 'required|string|max:255',
            'stu_mother_name_en' => 'required|string|max:255',
            'stu_mother_name_ar' => 'required|string|max:255',
            'Nationality' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'Roll' => 'required|numeric',
            'reg_id' => 'required|string|max:255',
        ]);

        // Create new student record
        studentInformation::create($validated);

        // Return success response
        return response()->json(['message' => 'Student registered successfully!'], 200);
    }





}
