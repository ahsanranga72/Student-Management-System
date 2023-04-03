<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BackEnd\Admin\AdminCourseController;
use App\Http\Controllers\BackEnd\Admin\AdminCourseMaterialController;
use App\Http\Controllers\BackEnd\Admin\ClassScheduleController;
use App\Http\Controllers\BackEnd\Admin\GuestController;
use App\Http\Controllers\BackEnd\Admin\HolidayController;
use App\Http\Controllers\BackEnd\Admin\QuestionController;
use App\Http\Controllers\BackEnd\Admin\StudentController;
use App\Http\Controllers\BackEnd\DashboardController;
use App\Http\Controllers\BackEnd\Student\AttendanceController;
use App\Http\Controllers\BackEnd\Student\StudentClassScheduleController;
use App\Http\Controllers\BackEnd\Student\StudentCourseMaterialController;
use App\Http\Controllers\FrontEnd\CourseController;
use App\Http\Controllers\FrontEnd\HomeController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', [LoginController::class, 'get_form'])->name('login');
    Route::post('login', [LoginController::class, 'submit'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('registration', [LoginController::class, 'registration'])->name('registration');
});

Route::group(['namespace' => 'FrontEnd', 'prefix' => 'frontend', 'as' => 'frontend.'], function () {
    Route::group(['prefix' => 'course', 'as' => 'course.'], function () {
        Route::get('by-category', [CourseController::class, 'by_category'])->name('by-category');
        Route::get('show/{id}', [CourseController::class, 'show'])->name('show');
    });
    Route::get('about-us', [HomeController::class, 'about_us'])->name('about-us');
    Route::post('submit-question', [HomeController::class, 'submit_question'])->name('submit-question');
});

Route::group(['namespace' => 'BackEnd', 'prefix' => 'backend', 'as' => 'backend.'], function () {
    Route::group(['middleware' => 'admin' ,'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('dashboard', [DashboardController::class, 'admin_dashboard'])->name('dashboard');
        Route::group(['namespace' => 'Admin'], function() {
            Route::group(['as' => 'students.', 'prefix' => 'students'], function() {
                Route::get('list', [StudentController::class, 'list'])->name('list');
                Route::get('create', [StudentController::class, 'create'])->name('create');
                Route::post('store', [StudentController::class, 'store'])->name('store');
                Route::get('show/{id}', [StudentController::class, 'show'])->name('show');
                Route::delete('delete/{id}', [StudentController::class, 'destroy'])->name('delete');
                Route::get('attendance', [StudentController::class, 'attendance'])->name('attendance');
            });
            Route::group(['as' => 'course.', 'prefix' => 'course'], function() {
                Route::get('list', [AdminCourseController::class, 'list'])->name('list');
                Route::get('create', [AdminCourseController::class, 'create'])->name('create');
                Route::post('store', [AdminCourseController::class, 'store'])->name('store');
                Route::delete('delete/{id}', [AdminCourseController::class, 'destroy'])->name('delete');
                Route::get('show/{id}', [AdminCourseController::class, 'show'])->name('show');
            });
            Route::group(['as' => 'course-material.', 'prefix' => 'course-material'], function() {
                Route::get('list', [AdminCourseMaterialController::class, 'list'])->name('list');
                Route::get('create', [AdminCourseMaterialController::class, 'create'])->name('create');
                Route::post('store', [AdminCourseMaterialController::class, 'store'])->name('store');
                Route::delete('delete/{id}', [AdminCourseMaterialController::class, 'destroy'])->name('delete');
                Route::get('show/{id}', [AdminCourseMaterialController::class, 'show'])->name('show');
            });
            Route::group(['as' => 'class-schedule.', 'prefix' => 'class-schedule'], function() {
                Route::get('list', [ClassScheduleController::class, 'list'])->name('list');
                Route::get('create', [ClassScheduleController::class, 'create'])->name('create');
                Route::post('store', [ClassScheduleController::class, 'store'])->name('store');
                Route::delete('delete/{id}', [ClassScheduleController::class, 'destroy'])->name('delete');
                Route::get('show/{id}', [ClassScheduleController::class, 'show'])->name('show');
            });
            Route::group(['as' => 'holiday.', 'prefix' => 'holiday'], function() {
                Route::get('list', [HolidayController::class, 'list'])->name('list');
                Route::get('create', [HolidayController::class, 'create'])->name('create');
                Route::post('store', [HolidayController::class, 'store'])->name('store');
                Route::delete('delete/{id}', [HolidayController::class, 'destroy'])->name('delete');
            });
            Route::group(['as' => 'question.', 'prefix' => 'question'], function() {
                Route::get('list', [QuestionController::class, 'list'])->name('list');
            });
            Route::group(['as' => 'guest.', 'prefix' => 'guest'], function() {
                Route::get('list', [GuestController::class, 'list'])->name('list');
                Route::delete('delete/{id}', [GuestController::class, 'destroy'])->name('delete');
            });
        });
    });
    Route::group(['middleware' => 'student' ,'prefix' => 'student', 'as' => 'student.'], function () {
        Route::get('dashboard', [DashboardController::class, 'student_dashboard'])->name('dashboard');
        Route::group(['as' => 'attendance.', 'prefix' => 'attendance'], function() {
            Route::post('clock-in', [AttendanceController::class, 'clock_in'])->name('clock-in');
            Route::post('clock-out', [AttendanceController::class, 'clock_out'])->name('clock-out');
            Route::get('list', [AttendanceController::class, 'list'])->name('list');
        });
        Route::group(['as' => 'class_schedule.', 'prefix' => 'class_schedule'], function() {
            Route::get('list', [StudentClassScheduleController::class, 'list'])->name('list');
        });
        Route::group(['as' => 'course-material.', 'prefix' => 'course-material'], function() {
            Route::get('list', [StudentCourseMaterialController::class, 'list'])->name('list');
            Route::get('show/{id}', [StudentCourseMaterialController::class, 'show'])->name('show');
        });
    });
});
