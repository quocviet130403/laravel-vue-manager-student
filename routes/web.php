<?php

use App\Http\Controllers\StudentController;
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
    return view('welcome');
});

Route::get('/student', [StudentController::class,'create']);
Route::get('/list-students', [StudentController::class,'index']);
Route::get('/edit-student/{id}', [StudentController::class,'edit']);
Route::get('/get-student-by-id/{id}', [StudentController::class,'getDataById']);
Route::get('/get-list-students/{searchQuery?}', [StudentController::class,'getData']);
Route::post('/add-student', [StudentController::class,'store']);
Route::put('/update-student/{id}', [StudentController::class,'update']);
Route::delete('/delete-student/{id}', [StudentController::class,'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
