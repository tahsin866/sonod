<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students_number_potrro;

class StudentController extends Controller
{
    /**
     * Search students based on filters: year, gender, roll, and registration ID.
     */
    public function search(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'year' => 'nullable|string',
            'gender' => 'nullable|integer', // Gender values: 1 (Male), 0 (Female)
            'Roll' => 'nullable|string',
            'reg_id' => 'nullable|string',
        ]);

        // Start the query to fetch students
        $query = students_number_potrro::query();

        // Apply filters if provided
        if ($request->year) {
            $query->where('years', $request->year); // Match the year
        }

        if ($request->gender !== null) {
            $query->where('SRtype', $request->gender); // Match gender using SRtype
        }

        if ($request->Roll) {
            $query->where('Roll', $request->Roll); // Match roll number
        }

        if ($request->reg_id) {
            $query->where('reg_id', $request->reg_id); // Match registration ID
        }

        // Get the filtered results
        $students = $query->get();

        // Check if any student matches the criteria
        if ($students->isEmpty()) {
            // If no matching student is found, return an empty array or a custom message
            return response()->json([], 200);
        }

        // Return the results as JSON
        return response()->json($students);
    }


    /**
     * Get filter options for years and genders.
     */
    public function getFilterOptions()
    {
        // Fetch unique years from the table
        $years = students_number_potrro::select('years')->distinct()->pluck('years');

        // Define gender options based on SRtype
        $genders = [
            ['key' => 'ছাত্র', 'value' => 1], // Male
            ['key' => 'ছাত্রী', 'value' => 0], // Female
        ];

        // Return years and genders as JSON
        return response()->json([
            'years' => $years,
            'genders' => $genders,
        ]);
    }
}
