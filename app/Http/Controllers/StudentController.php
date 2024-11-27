<?php

namespace App\Http\Controllers;

use App\Models\sanawiyah;
use Illuminate\Http\Request;
use App\Models\students_number_potrro;
use Inertia\Inertia;

class StudentController extends Controller
{
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

        $student = students_number_potrro::where([
            ['years', $request->year],
            ['SRtype', $request->gender],
            ['Roll', $request->Roll],
            ['reg_id', $request->reg_id],
            ['CID', 2]
        ])->first();

        if (!$student) {
            return response()->json([
                'status' => 'error',
                'message' => 'কোনো ছাত্র/ছাত্রী খুঁজে পাওয়া যায়নি',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $student,
        ]);
    }

    public function details($Roll, $reg_id,$SRType)
    {
        $student = students_number_potrro::where('Roll', $Roll)
            ->where('reg_id', $reg_id)
            ->where('SRType', $SRType)
            ->firstOrFail();

        return Inertia::render('Fazilat/studentDetails', [
            'Roll' => $Roll,
            'reg_id' => $reg_id,
            'SRType' => $SRType,
            'student' => $student,
        ]);
    }

    public function getStudentDetails($Roll, $reg_id,$SRType)
    {
        $student = students_number_potrro::where('Roll', $Roll)
            ->where('reg_id', $reg_id)
            ->where('SRType', $SRType)
            ->firstOrFail();

        return response()->json([
            'status' => 'success',
            'data' => $student,
        ]);
    }

    public function getFilterOptions()
    {
        $years = students_number_potrro::select('years')
            ->distinct()
            ->orderBy('years', 'desc')
            ->pluck('years');

        $genders = [
            ['key' => 'ছাত্র', 'value' => 1],
            ['key' => 'ছাত্রী', 'value' => 0],
        ];

        return response()->json([
            'years' => $years,
            'genders' => $genders,
        ]);
    }
}








