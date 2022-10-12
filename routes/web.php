<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'postLogin']);
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

Route::middleware('auth')->prefix('/')->group(function(){
    Route::get('/', [UserController::class,'index'])->name('home');
    
    Route::get('/users', [UserController::class,'index'])->name('get.users');
    Route::post('/users', [UserController::class,'store']);
    Route::get('/users/edit/{id}', [UserController::class,'edit']);
    Route::post('/users/edit/{id}', [UserController::class,'update']);
    Route::post('/users/block/{id}', [UserController::class,'block']);
    Route::post('/users/delete/{id}', [UserController::class,'delete']);
});