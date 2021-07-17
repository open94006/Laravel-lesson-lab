<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/show', [BoardController::class, 'show'])->name('show');

Route::pattern('student_no', 'u[0-9]{7}');

Route::group(['prefix' => 'student'], function () {
    Route::get('/{student_no}', [StudentController::class, 'getStudentData'])
        ->name("students");

    Route::get('/{student_no}/score/{subject?}', [StudentController::class, 'getStudentScore'])
        ->where(['subject' => '(chinese|english|math)', 'foo' => '表達式'])->name('students.score');

    Route::group(['prefix' => 'edit'], function () {
        Route::get('/{student_no}', [SchoolController::class, 'edit'])->name('students.edit');
        Route::post('/{student_no}', [SchoolController::class, 'update'])->name('students.post');
        Route::get('/self', [SchoolController::class, 'edit_self'])->name('students.edit_self');
    });


    Route::get('login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('login', [AuthController::class, 'postLogin']);
    Route::get('logout', [AuthController::class, 'getLogout']);
});