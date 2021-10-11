<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

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
    return view('frontend.home');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::resource('category',CategoryController::class);
Route::resource('tag',TagController::class);
Route::resource('admin',AdminController::class);
Route::resource('post',PostController::class);

Route::get('register',[AuthController::class,'showRegisterForm'])->name('register');
Route::post('register',[AuthController::class,'processRegister']);
Route::get('login',[AuthController::class,'showLoginForm'])->name('login');
Route::post('login',[AuthController::class,'processLogin']);
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::get('profile/{id}',[AuthController::class,'profile'])->name('profile');
Route::get('register/{id}',[AuthController::class,'editProfile'])->name('register.edit');
Route::put('register/{id}',[AuthController::class,'updateProfile'])->name('register.update');
