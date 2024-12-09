<?php

use App\Http\Controllers\sanawiyahController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::put('/student/{Roll}/{reg_id}', [StudentController::class, 'update']);
Route::get('Fazilat/generate-pdf/{Roll}/{reg_id}/{SRType}', [StudentController::class, 'generatePdf']);
Route::put('/student/{Roll}/{reg_id}', [StudentController::class, 'update']);
Route::get('/student/{Roll}/{reg_id}/{SRType}', [StudentController::class, 'getStudentDetails']);
Route::get('/fazilat/student/{Roll}/{reg_id}/{SRType}/pdf', [StudentController::class, 'generatePDF']);

Route::get('/search', [StudentController::class, 'search']);
Route::get('/filter-options', [StudentController::class, 'getFilterOptions']);



// সানাবিয়া উলইয়া

Route::get('/SanabiyaUliya', [sanawiyahController::class, 'SanabiyaUliya']);




// Route::post('/student', [StudentController::class, 'search']);
// Route::post('/student/register', [StudentController::class, 'store'])->name('student.store');


