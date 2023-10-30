<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (auth()->guest()) {
        return redirect()->route('login');
    } else {
        if (auth()->user()->role === "student" && auth()->user()->status === 'inactive') {
            return redirect()->route('pending');
        }
        return redirect()->route('dashboard');
    }
});

Auth::routes();

Route::middleware(['auth'])->group(function() {

    // Change Semester
    Route::post('/change-semester', [\App\Http\Controllers\DashboardController::class, 'change_semester'])->name('change-semester');

    // Pending
    Route::get('/pending', [\App\Http\Controllers\DashboardController::class, 'pending'])->name('pending');

    // Dashboard
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    // Registration
    Route::resource('/registration', \App\Http\Controllers\RegistrationController::class);

    // Company
    Route::post('/company/request', [\App\Http\Controllers\CompanyController::class, 'request_company'])->name('company.request_company');
    Route::post('/company/register', [\App\Http\Controllers\CompanyController::class, 'register_company'])->name('company.register_company');
    Route::get('/company/submission', [\App\Http\Controllers\CompanyController::class, 'index_submission'])->name('company.index_submission');
    Route::resource('/company', \App\Http\Controllers\CompanyController::class);

    // Schedule
    Route::resource('/schedule', \App\Http\Controllers\ScheduleController::class);

    // Internship
    Route::resource('/internship', \App\Http\Controllers\InternshipController::class);

    // Scores 
    Route::resource('/score', \App\Http\Controllers\ScoreController::class)->parameters([
        'score' => 'user'
    ]);

    // Lecturer
    Route::post('/lecturer/{lecturer}/add-student', [\App\Http\Controllers\LecturerController::class, 'add_student'])->name('lecturer.add_student');
    Route::resource('/lecturer', \App\Http\Controllers\LecturerController::class);

    // Daily Report
    Route::get('/report/student/{student}', [\App\Http\Controllers\ReportController::class, 'index_student'])->name('report.index_student');
    Route::get('/report/student/{student}/detail/{report}', [\App\Http\Controllers\ReportController::class, 'show_student'])->name('report.show_student');
    Route::get('/report/student/{student}/print', [\App\Http\Controllers\ReportController::class, 'print'])->name('report.print');
    Route::resource('/report', \App\Http\Controllers\ReportController::class);

    // Last Report
    Route::get('/last-report/student/{student}', [\App\Http\Controllers\LastReportController::class, 'index_student'])->name('last-report.index_student');
    Route::get('/last-report/student/{student}/detail/{report}', [\App\Http\Controllers\LastReportController::class, 'show_student'])->name('last-report.show_student');
    Route::resource('/last-report', \App\Http\Controllers\LastReportController::class);

    // User
    Route::get('/profile', [\App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::get('/user/{user}/reset-password', [\App\Http\Controllers\UserController::class, 'reset_password'])->name('user.reset-password');
    Route::resource('/user', \App\Http\Controllers\UserController::class);

    Route::resource('/information', \App\Http\Controllers\InformationController::class);

});

