<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\CoureseController;
use App\Http\Controllers\subcoureseController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AllocateController;






// Route::get('/admintrainer/index', function () {
//     return view('admin/index');
// });


Route::get('/dashboard', [adminController::class, 'index'])->name('dashboard');


// Trainer Routes
Route::get('/trainer/index', [TrainerController::class, 'index'])->name('trainer.index');
Route::get('/trainer/create', [TrainerController::class, 'create'])->name('trainer.create');
Route::post('/trainers/store', [TrainerController::class, 'store'])->name('trainers.store');
Route::post('/trainers/store', [TrainerController::class, 'store'])->name('trainers.store');
Route::get('/trainer/{id}/edit', [TrainerController::class, 'edit'])->name('trainer.edit');
Route::put('/trainer/{id}', [TrainerController::class, 'update'])->name('trainer.update');
Route::delete('/trainer/{id}', [TrainerController::class, 'destroy'])->name('trainer.destroy');



// Course Routes
Route::get('/course/create', [CoureseController::class, 'create'])->name('course.create');
Route::get('/course/index', [CoureseController::class, 'index'])->name('course.index');
Route::post('/course/store', [CoureseController::class, 'store'])->name('course.store');
Route::post('/course/store', [CoureseController::class, 'store'])->name('course.store');
Route::get('/course/{id}/edit', [CoureseController::class, 'edit'])->name('course.edit');
Route::put('/course/{id}', [CoureseController::class, 'update'])->name('course.update');
Route::delete('/course/{id}', [CoureseController::class, 'destroy'])->name('course.destroy');


// sub-Course Routes
Route::get('/subcourse/create', [subcoureseController::class, 'create'])->name('subcourse.create');
Route::get('/subcourse/index', [subcoureseController::class, 'index'])->name('subcourse.index');
Route::post('/subcourse/store', [subcoureseController::class, 'store'])->name('subcourse.store');
Route::post('/subcourse/store', [subcoureseController::class, 'store'])->name('subcourse.store');
Route::get('/subcourse/{id}/edit', [subcoureseController::class, 'edit'])->name('subcourse.edit');
Route::put('/subcourse/{id}', [subcoureseController::class, 'update'])->name('subcourse.update');
Route::delete('/subcourse/{id}', [subcoureseController::class, 'destroy'])->name('subcourse.destroy');

// college Routes
Route::get('/college/create', [CollegeController::class, 'create'])->name('college.create');
Route::get('/college/index', [CollegeController::class, 'index'])->name('college.index');
Route::post('/college/store', [CollegeController::class, 'store'])->name('college.store');
Route::post('/college/store', [CollegeController::class, 'store'])->name('college.store');
Route::get('/college/{id}/edit', [CollegeController::class, 'edit'])->name('college.edit');
Route::put('/college/{id}', [CollegeController::class, 'update'])->name('college.update');
Route::delete('/college/{id}', [CollegeController::class, 'destroy'])->name('college.destroy');


// Student Routes
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::get('/student/index', [StudentController::class, 'index'])->name('student.index');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');



// allocate Routes
Route::get('/allocate/create', [AllocateController::class, 'create'])->name('allocate.create');
Route::get('/allocate/index', [AllocateController::class, 'index'])->name('allocate.index');
Route::post('/allocate/store', [AllocateController::class, 'store'])->name('allocate.store');
Route::post('/allocate/store', [AllocateController::class, 'store'])->name('allocate.store');
Route::get('/allocate/{id}/edit', [AllocateController::class, 'edit'])->name('allocate.edit');
Route::put('/allocate/{id}', [AllocateController::class, 'update'])->name('allocate.update');
Route::delete('/allocate/{id}', [AllocateController::class, 'destroy'])->name('allocate.destroy');



