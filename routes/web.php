<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BackEnd\Admin\StudentController;
use App\Http\Controllers\BackEnd\DashboardController;
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
});

Route::group(['namespace' => 'FrontEnd', 'prefix' => 'frontend', 'as' => 'frontend.'], function () {
    Route::group(['prefix' => 'course', 'as' => 'course.'], function () {
        Route::get('by-category', [CourseController::class, 'by_category'])->name('by-category');
    });
    Route::get('about-us', [HomeController::class, 'about_us'])->name('about-us');
});

Route::group(['namespace' => 'BackEnd', 'prefix' => 'backend', 'as' => 'backend.'], function () {
    Route::group(['middleware' => 'admin' ,'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('dashboard', [DashboardController::class, 'admin_dashboard'])->name('dashboard');
        Route::group(['namespace' => 'Admin'], function() {
            Route::group(['as' => 'students.', 'prefix' => 'students'], function() {
                Route::get('list', [StudentController::class, 'list'])->name('list');
                Route::get('create', [StudentController::class, 'create'])->name('create');
            });
        });
    });
});
