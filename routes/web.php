<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::resource('dashboard/category', CategoryController::class);
Route::resource('dashboard/user', UserController::class);
Route::resource('dashboard/post', PostController::class);
Auth::routes();
//Rutas para redireccionar despues de loguear
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('index');

// Rutas con restriccion para rol invitado

Route::get('/dashboard/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create')->middleware('rol.invitado');
Route::get('/dashboard/post/edit/{post}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit')->middleware('rol.invitado');

//https://github.com/CesarMorales01/BlogIUDigital.git
// npm run dev
//Route::middleware('auth')->group(function(){});
?>
