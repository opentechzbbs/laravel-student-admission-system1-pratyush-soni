<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdmissionController;



Route::middleware(['auth', 'verified', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('admin');
    Route::get('/admin/department', [ProfileController::class, 'department'])->name('admin.department');
    Route::get('/admin/course', [CoursesController::class, 'index'])->name('admin.course');
    Route::get('/admin/viewcourse', [CoursesController::class, 'view'])->name('admin.viewcourse');
    Route::get('/course/by-department', [CoursesController::class, 'getByDepartment'])->name('course.by.department');
    Route::resource('department', DepartmentController::class);
    Route::resource('courses', CoursesController::class);
    Route::resource('course', CoursesController::class);
    Route::get('/admission/step1', [AdmissionController::class, 'step1'])->name('admission.step1');
    Route::post('/admission/step1', [AdmissionController::class, 'postStep1']);

    Route::get('/admission/step2', [AdmissionController::class, 'step2'])->name('admission.step2');
    Route::post('/admission/step2', [AdmissionController::class, 'postStep2']);

    Route::get('/admission/step3', [AdmissionController::class, 'step3'])->name('admission.step3');
    Route::post('/admission/step3', [AdmissionController::class, 'postStep3']);

    Route::post('/get-courses-by-department', [CoursesController::class, 'getCoursesByDepartment']);

    Route::post('/admission/submit', [AdmissionController::class, 'submit'])->name('admission.submit');
    Route::get('/admission', [AdmissionController::class, 'index'])->name('admission.index');
    Route::resource('admissions', AdmissionController::class);

    Route::get('/admission/preview/{id}', [AdmissionController::class, 'preview'])->name('admission.preview');
    Route::get('/admission/download-pdf/{id}', [AdmissionController::class, 'downloadPdf'])->name('admission.downloadPdf');
});
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/student/dashboard', function () {
        return view('student.index');
    })->middleware(['auth', 'verified'])->name('student');
    Route::get('/student/Resgistration', function () {
        return view('student.registration');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
