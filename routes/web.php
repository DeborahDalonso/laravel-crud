<?php

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

Route::get('/post/create', [PostsController::class, 'create'])->name('post.create');
Route::post('/post/create', [PostsController::class, 'store'])->name('post.store');

Route::prefix('user')->controller(UsersController::class)->name('user.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/{id}/details', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::get('/{id}/address', 'address')->name('address');
    Route::get('/{id}/posts', 'posts')->name('posts');
    Route::put('/{id}/update', 'update')->name('update');
    Route::delete('/{id}/delete', 'destroy')->name('destroy');
});
