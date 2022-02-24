<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::get('/signup',[UserController::class , 'viewCreate']);
Route::get('/login',[UserController::class , 'viewLogin']);
Route::get('/profile',[UserController::class , 'viewProfile']);
Route::get('/profile/products',[UserController::class , 'viewProducts']);
Route::get('/profile/logout',[UserController::class , 'logout']);

Route::post('/signup',[UserController::class , 'createAccount']);
Route::post('/login',[UserController::class , 'loginAccount']);
Route::post('/profile/edit',[UserController::class , 'editAccount']);
Route::post('/profile/delete',[UserController::class , 'deleteAccount']);

Route::get('/shop',[ProductController::class , 'viewProducts']);
Route::get('/products/{id}/edit',[ProductController::class , 'viewEdit']);

Route::post('/product/create',[ProductController::class , 'createProduct']);
Route::post('/products/{id}/edit',[ProductController::class , 'editProduct']);
Route::post('/products/{id}/delete',[ProductController::class , 'deleteProduct']);