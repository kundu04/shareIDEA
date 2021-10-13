<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;

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

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('register',[AuthController::class,'showRegisterForm'])->name('register');
Route::post('register',[AuthController::class,'processRegister']);
Route::get('login',[AuthController::class,'showLoginForm'])->name('login');
Route::post('login',[AuthController::class,'processLogin']);
Route::get('details/{id}',[PostController::class,'details'])->name('post.details');

Route::middleware('auth')->group(function (){
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
    Route::get('profile/{id}',[AuthController::class,'profile'])->name('profile');
    Route::get('register/{id}',[AuthController::class,'editProfile'])->name('register.edit');
    Route::put('register/{id}',[AuthController::class,'updateProfile'])->name('register.update');
    Route::resource('post',PostController::class);
    Route::post('comment',[CommentController::class,'store'])->name('comment.store');
    Route::delete('comment/{id}',[CommentController::class,'destroy'])->name('comment.destroy');

    Route::group(['prefix'=>'admin', 'middleware' => ['user_access_control']], function() {
       
        Route::get('dashboard',[DashBoardController::class,'index'])->name('dashboard');
        Route::get('user',[DashBoardController::class,'registered_user'])->name('dashboard.user');
        Route::get('user/{id}',[DashBoardController::class,'block_user'])->name('block.user');
        Route::get('post/{id}',[DashBoardController::class,'unlist_post'])->name('unlist.post');

        Route::resource('category',CategoryController::class);
        Route::resource('tag',TagController::class);
        Route::resource('admin',AdminController::class);

        
    
    });
});

