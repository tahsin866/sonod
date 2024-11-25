<?php

use App\Http\Controllers\demoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/Fazilat.Fazilat' , function () {
    return Inertia::render('Fazilat/Fazilat');
})->middleware(['auth', 'verified'])->name('Fazilat');

Route::get('/Fazilat.studentDetails' , function () {
    return Inertia::render('Fazilat/studentDetails');
})->middleware(['auth', 'verified'])->name('studentDetails');

Route::get('/fazilat/student/{Roll}', [StudentController::class, 'details'])->name('studentDetails');






Route::get('/Fazilat.sana' , function () {
    return Inertia::render('Fazilat/sana');
})->middleware(['auth', 'verified'])->name('sana');





// routes/web.php


// Route::get('students/search', [StudentController::class, 'search']);

Route::post('/student/register', [StudentController::class, 'store'])->name('student.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
