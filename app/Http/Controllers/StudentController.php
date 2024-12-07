<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\students_number_potrro;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Database\Eloquent\ModelNotFoundException;



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
            ['CID', 2],
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

    public function details($Roll, $reg_id, $SRType)
    {
        try {
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
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors(['message' => 'Student not found']);
        }
    }

    public function getStudentDetails($Roll, $reg_id, $SRType)
    {
        try {
            $student = students_number_potrro::where('Roll', $Roll)
                ->where('reg_id', $reg_id)
                ->where('SRType', $SRType)
                ->firstOrFail();

            return response()->json([
                'status' => 'success',
                'data' => $student,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Student not found',
            ], 404);
        }
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

    public function update(Request $request, $Roll, $reg_id)
    {
        $validated = $request->validate([
            'Name' => 'required|string',
            'Father' => 'required|string',
            'DateofBirth' => 'required|date',
            'st_en_name' => 'required|string', // Updated validation rule
            'st_en_Fname' => 'required|string',
            'BirthRegistrationNo_nid_no' => 'required|string',
            'mobileNumber' => 'required|string',
            'MadrashaNameEn' => 'nullable|string'
        ]);

        $student = students_number_potrro::where([
            'Roll' => $Roll,
            'reg_id' => $reg_id,
            'CID' => 2
        ])->first();

        if ($student) {
            $student->update($validated);
            $message = 'Student updated successfully';
        } else {
            $validated['Roll'] = $Roll;
            $validated['reg_id'] = $reg_id;
            $validated['CID'] = 2;
            $student = students_number_potrro::create($validated);
            $message = 'Student created successfully';
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $student->fresh()
        ]);
    }


    public function generatePDF($Roll, $reg_id, $SRType)
    {
        try {
            // Enable debug logging
            \Log::info('Starting PDF generation', [
                'Roll' => $Roll,
                'reg_id' => $reg_id,
                'SRType' => $SRType
            ]);

            $student = students_number_potrro::where([
                'Roll' => $Roll,
                'reg_id' => $reg_id,
                'SRType' => $SRType
            ])->first();

            if (!$student) {
                \Log::error('Student not found');
                return response()->json(['error' => 'Student not found'], 404);
            }

            // Verify template exists
            $view = 'pdf.studentPdf';
            if (!view()->exists($view)) {
                \Log::error('PDF template not found', ['view' => $view]);
                return response()->json(['error' => 'PDF template not found'], 500);
            }

            // Generate PDF with error catching
            $pdf = PDF::loadView($view, ['student' => $student]);

            // Set paper size and orientation if needed
            $pdf->setPaper('A4', 'portrait');

            return $pdf->stream('student-details.pdf');

        } catch (\Exception $e) {
            \Log::error('PDF Generation failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    }

