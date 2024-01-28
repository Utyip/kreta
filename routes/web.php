<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);



Route::resource('/students', App\Http\Controllers\StudentController::class);
Route::get('/students/show_deleted', [App\Http\Controllers\StudentController::class, 'show_deleted'])->name('students.show_deleted');
Route::put('/students/restore/{student}', [App\Http\Controllers\StudentController::class, 'restore'])->name('Students.restore')->withTrashed();



Route::resource('/learnDays', App\Http\Controllers\LearnDayController::class);
Route::get('/learnDays/show_deleted', [App\Http\Controllers\LearnDayController::class, 'show_deleted'])->name('learnDays.show_deleted');
Route::put('/learnDays/restore/{learndays}', [App\Http\Controllers\LearnDayController::class, 'restore'])->name('learnDays.restore')->withTrashed();



Route::resource('/attendances', App\Http\Controllers\AttendanceController::class);
Route::get('/attendances/show_deleted', [App\Http\Controllers\AttendanceController::class, 'show_deleted'])->name('attendances.show_deleted');
Route::put('/attendances/restore/{attendances}', [App\Http\Controllers\AttendanceController::class, 'restore'])->name('attendances.restore')->withTrashed();
