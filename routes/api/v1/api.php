<?php

use App\Http\Controllers\Api\V1\Student\AttendanceController;
use App\Http\Controllers\Api\V1\Student\Auth\LoginController;
use App\Http\Controllers\Api\V1\Student\Auth\RegistrationController;
use App\Http\Controllers\Api\V1\Student\CourseController;
use App\Http\Controllers\Api\V1\Student\OthersController;
use App\Http\Controllers\Api\V1\Student\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api/V1/Student', 'prefix'=>'student'], function() {
    Route::group(['namespace' => 'Auth', 'prefix'=>'auth'], function() {
        Route::post('login', [LoginController::class, 'student_login']);
        Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:api');
        Route::post('registration', [RegistrationController::class, 'student_register']);
    });

    Route::group(['middleware'=>'auth:api'], function() {
        Route::post('clock-in', [AttendanceController::class, 'clock_in']);
        Route::post('clock-out', [AttendanceController::class, 'clock_out']);
        Route::get('attendance-list', [AttendanceController::class, 'attendance_list']);
        Route::get('attendance-today', [AttendanceController::class, 'todays_attendance']);
        Route::get('attendance-count', [AttendanceController::class, 'count_attendance']);

        Route::group(['prefix' => 'profile'], function() {
            Route::get('get', [ProfileController::class, 'get']);
            Route::post('update', [ProfileController::class, 'update']);
        });

        Route::get('class-schedule', [OthersController::class, 'get_class_shecule']);
    });

    Route::group(['prefix' => 'course'], function() {
        Route::get('get', [CourseController::class, 'get']);
    });

    Route::group(['prefix' => 'holidays'], function() {
        Route::get('get', [OthersController::class, 'get_holidays']);
    });

    Route::group(['prefix' => 'question'], function() {
        Route::post('submit', [OthersController::class, 'question_submit']);
    });


});