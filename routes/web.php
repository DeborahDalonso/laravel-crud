<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
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

Route::redirect('/', 'login');

Route::get('/register', [AuthController::class, 'formRegister'])->name('register');
Route::get('/login', [AuthController::class, 'formLogin'])->name('login'); //a rota que em authenticate vai ser redirecionada
Route::post('/login', [AuthController::class, 'login'])->name('post.login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('post.logout');

Route::get('/post/create', [PostsController::class, 'create'])->name('post.create');
Route::post('/post/create', [PostsController::class, 'store'])->name('post.store');

//Aplica a obrigatoriedade de autenticação
Route::middleware('auth')
    ->prefix('user')
    ->controller(UsersController::class)
    ->name('user.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store')->withoutMiddleware('auth'); //deixa apenas essa  rota sem a aplicação do middleware auth
        Route::get('/{id}/details', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::get('/{id}/address', 'address')->name('address');
        Route::get('/{id}/posts', 'posts')->name('posts');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/delete', 'destroy')->name('destroy');
    });
