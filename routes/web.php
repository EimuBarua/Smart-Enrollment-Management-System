<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseManipulationController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\OverlapController;
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
    return view('welcome');
});
Route::get('admin',[LayoutController::class,'admin']);

// Authentication.
Route::get('register', [AuthController::class,'register']);
Route::get('login', [AuthController::class,'login']);
Route::post('store-register', [AuthController::class,'storeRegister']);
Route::post('store-login', [AuthController::class,'storeLogin']);
Route::middleware(['checkLoggedIn'])->group(function () {
    Route::get('dashboard', [AuthController::class,'dashboard']);
    Route::get('logout', [AuthController::class,'logout']);

    

    Route::middleware(['IsStudent'])->group(function () {
        //enroll
        Route::get('enroll', [EnrollController::class,'enroll']);
        
        Route::post('addenroll/{id}/{sid}', [EnrollController::class,'addEnroll']);
    });
    
    //isADMIN IsAdmin
    Route::middleware(['IsAdmin'])->group(function () {
            //Session
        Route::get('create-session', [SessionController::class,'create_session']);
        Route::post('add-session', [SessionController::class,'add_session']);
        Route::get('session-list', [SessionController::class,'session_list']);
        Route::get('session-list', [SessionController::class,'session_list']);
        Route::get('delete-session/{id}', [SessionController::class,'delete_session']);


        //course
        Route::get('create-course', [CourseController::class,'create_course']);
        Route::post('add-course', [CourseController::class,'add_course']);
        Route::get('course-list', [CourseController::class,'course_list']);
        Route::get('delete-course/{id}', [CourseController::class,'delete_course']);
        Route::get('edit-course/{id}', [CourseController::class,'edit_course']);
        Route::post('update-course/{id}', [CourseController::class,'update_course']);

        //assign course assign_course
        Route::get('assign-course/{id}', [CourseManipulationController::class,'assign_course']);
        Route::post('addsession-courses/{id}', [CourseManipulationController::class,'addsession_courses']);
        Route::get('display-subjects/{id}', [CourseManipulationController::class,'display_offered_subjecs']);

        Route::get('overlap', [OverlapController::class,'overlap']);

    });
});


