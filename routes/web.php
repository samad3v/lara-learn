<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function (){
        Route::get('/', [AdminHomeController::class, 'index'])->name('home');
        Route::resource('posts', PostController::class);
        Route::resource('categories' , CategoryController::class);
    });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/posts/{post}', [HomeController::class, 'showPost'])->name('post.show');
