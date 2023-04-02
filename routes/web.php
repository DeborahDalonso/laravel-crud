<?php

use App\Http\Controllers\UsersController;
use App\Http\Middleware\MyFirstMiddleware;
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


Route::get('/', [UsersController::class, 'index']);
Route::get('/users', [UsersController::class, 'index'])->name('user.index');
Route::get('/user/create', [UsersController::class, 'create'])->name('user.create');
Route::post('/user/create', [UsersController::class, 'store'])->name('user.store');
Route::get('/user/{id}', [UsersController::class, 'show'])->name('user.show');
Route::get('/user/edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
Route::put('/user/update/{id}', [UsersController::class, 'update'])->name('user.update');
Route::delete('/user/delete/{id}', [UsersController::class, 'destroy'])->name('user.destroy');

// Instanciando o middleware diretamente na rota
// Route::get('/users', [UsersController::class, 'index'])->middleware(\App\Http\Middleware\MyFirstMiddleware::class)->name('user.index');

//Instanciando no Kernel
// Route::get('/users', [UsersController::class, 'index'])->middleware(['myFirstMiddleware'])->name('user.index');

//Passando um parametro, uma role 
Route::get('/users', [UsersController::class, 'index'])->middleware(['myFirstMiddleware:Admin'])->name('user.index');
