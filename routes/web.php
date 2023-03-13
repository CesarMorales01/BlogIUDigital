<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//web controller no existe!
//Route::get('/web', 'web/WebController@index')->name('web');

Route::get('/post', [App\Http\Controllers\HomeController::class, 'index'])->name('post.show');
Route::resource('dashboard/category', CategoryController::class);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('index');
Route::resource('dashboard/user', UserController::class);

// npm run dev
?>
