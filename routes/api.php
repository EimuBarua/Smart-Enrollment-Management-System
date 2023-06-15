<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AllApiController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('semester-subjects/{id}', [AllApiController::class,'semester_subjects']);

Route::get('offered-subj', [AllApiController::class,'offered_sub']);

// Route::get('offered-subj/{semester}/{session_id}', [AllApiController::class,'offered_sub']);
// Route::get('offered-subj', [AllApiController::class,'offered_sub']);


Route::get('session-semester/{id}', [AllApiController::class,'session_semester']);
Route::get('session-subject/{session}/{semester}', [AllApiController::class,'session_subject']);
Route::get('overlap/{session}', [AllApiController::class,'overlap']);