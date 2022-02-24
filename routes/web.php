<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::get('/users',[UserController::class,'showAll']);

Route::get('/signup',[UserController::class , 'viewCreate']);
Route::get('/login',[UserController::class , 'viewLogin']);
Route::get('/profile',[UserController::class , 'viewProfile']);

Route::post('/signup',[UserController::class , 'createAccount']);
Route::post('/login',[UserController::class , 'loginAccount']);
Route::post('/profile/edit',[UserController::class , 'editAccount']);
Route::post('/profile/delete',[UserController::class , 'deleteAccount']);