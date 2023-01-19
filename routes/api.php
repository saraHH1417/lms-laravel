<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/auth/register', [\App\Http\Controllers\Auth\RegisterController::class, "create"]);
Route::post('/auth/login', [\App\Http\Controllers\Auth\LoginController::class , "login"]);


Route::resource("books", \App\Http\Controllers\BookController::class);
Route::resource("categories", \App\Http\Controllers\CategroyController::class);
Route::resource("courses", \App\Http\Controllers\CourseController::class);
Route::resource("lessons", \App\Http\Controllers\LessonController::class);
Route::resource("questions", \App\Http\Controllers\QuestionController::class);
Route::resource("tests", \App\Http\Controllers\TestController::class);
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
