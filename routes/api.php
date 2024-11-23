<?php
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/search', [StudentController::class, 'search']);
Route::get('/filter-options', [StudentController::class, 'getFilterOptions']);



// সানাবিয়া উলইয়া

Route::get('/SanabiyaUliya', [StudentController::class, 'SanabiyaUliya']);

// Route::post('/student', [StudentController::class, 'search']);
// Route::post('/student/register', [StudentController::class, 'store'])->name('student.store');


