<?php

namespace App\Http\Controllers;

use App\Models\sanawiyah;
use Illuminate\Http\Request;
use App\Models\students_number_potrro;

class StudentController extends Controller
{
    /**
     * Search students based on filters: year, gender, roll, and registration ID.
     */
  public function search(Request $request)
{
    $request->validate([
        'year' => 'required|string',
        'gender' => 'required|integer',
        'Roll' => 'required|string',
        'reg_id' => 'required|string',
    ], [
        'year.required' => 'বছর নির্বাচন করুন',
        'gender.required' => 'ছাত্র/ছাত্রী নির্বাচন করুন',
        'Roll.required' => 'রোল নম্বর প্রয়োজন',
        'reg_id.required' => 'রেজিস্ট্রেশন আইডি প্রয়োজন',
    ]);

    $student = students_number_potrro::where('years', $request->year)
    ->where('SRtype', $request->gender)
    ->where('Roll', $request->Roll)
    ->where('reg_id', $request->reg_id)
    // ->where('CID', $request->CID)
    ->where('CID', 2)  // Ensure CID is 3
    ->first();


    if (!$student) {
        return response()->json([
            'status' => 'error',
            'message' => 'কোনো ছাত্র/ছাত্রী খুঁজে পাওয়া যায়নি',
        ], 404);
    }

    return response()->json([
        'status' => 'success',
        'data' => $student,
    ], 200);





}



// SanabiyaUliya

public function SanabiyaUliya(Request $request)
{
  $request->validate([
      'year' => 'required|string',
      'gender' => 'required|integer',
      'Roll' => 'required|string',
      'reg_id' => 'required|string',
  ], [
      'year.required' => 'বছর নির্বাচন করুন',
      'gender.required' => 'ছাত্র/ছাত্রী নির্বাচন করুন',
      'Roll.required' => 'রোল নম্বর প্রয়োজন',
      'reg_id.required' => 'রেজিস্ট্রেশন আইডি প্রয়োজন',
  ]);

  $student = students_number_potrro::where('years', $request->year)
  ->where('SRtype', $request->gender)
  ->where('Roll', $request->Roll)
  ->where('reg_id', $request->reg_id)
  // ->where('CID', $request->CID)
  ->where('CID', 3)  // Ensure CID is 3
  ->first();


  if (!$student) {
      return response()->json([
          'status' => 'error',
          'message' => 'কোনো ছাত্র/ছাত্রী খুঁজে পাওয়া যায়নি',
      ], 404);
  }

  return response()->json([
      'status' => 'success',
      'data' => $student,
  ], 200);





}















    /**
     * Get filter options for years and genders.
     */
    public function getFilterOptions()
{
    $years = students_number_potrro::select('years')
    ->distinct()
    ->orderBy('years', 'asc') // Ensures years are sorted in ascending order
    ->pluck('years');

    // Updated gender mapping to match database values
    $genders = [
        ['key' => 'ছাত্র', 'value' => 1], // Male - SRtype = 0
        ['key' => 'ছাত্রী', 'value' => 0], // Female - SRtype = 1
    ];

    return response()->json([
        'years' => $years,
        'genders' => $genders,
    ]);
}
}
