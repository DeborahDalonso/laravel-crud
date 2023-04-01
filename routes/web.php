<?php

use App\Http\Controllers\UsersController;
use App\Models\User;
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


//Aula 2
//Parametro fixo
// Route::get('/users/{id}', [UsersController::class, 'show']);

//Parametro opcional
// Route::get('/users/{id?}', [UsersController::class, 'show']);

//Limitador para parametro
// Route::get('/users/{id}', [UsersController::class, 'show'])->where('id','[0-9]+');

//Limitador para mais de um parametro
// Route::get('/users/{id}/{name}', [UsersController::class, 'show'])->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);

//Limitador sem expressão regular
// Route::get('/users/{id}/{name}/{lot}', [UsersController::class, 'show'])
// ->whereNumber('id')
// ->whereAlpha('name')
// ->whereAlphaNumeric('lot');

//Agrupamento de rotas
// Route::prefix('user')
//     ->name('user.')
//     ->controller(UsersController::class)
//     ->group(function () {
//         Route::get('/', 'index')->name('index');
//         Route::get('/create', 'create')->name('create');
//         Route::post('/create', 'store')->name('store');
//         Route::get('/{id}', 'show')->name('show');
//         Route::get('/edit/{id}', 'edit')->name('edit');
//         Route::put('/update/{id}', 'update')->name('update');
//         Route::delete('/delete/{id}', 'destroy')->name('destroy');
//     });

//Injeção de dependencia
// Route::get('/user/{user}', [UsersController::class, 'show'])->name('user.show');
// Route::get('/user/{user:email}', [UsersController::class, 'show'])->name('user.show');

//Busca com withTrashed
// Route::get('/user/{user}', [UsersController::class, 'show'])->withTrashed()->name('user.show');

//Busca com Missing - parametro não existe
// Route::get('/user/{user}', [UsersController::class, 'show'])->missing(function(){
//     return redirect()->route('user.index');
// })->name('user.show');

//Rota fallback - rota não existe
// Route::fallback(function(){
//     return redirect()->route('user.index');
// });

//Tudo em um
// Route::fallback(function () {
//     return redirect()->route('user.index');
// });

//Cria todas as rotas, /user/show, /user/index ...etc, mergeia metodos com o /user
// Route::resource('/user', UsersController::class);

// //Nomeando todas as rotas
// Route::resource('/user', UsersController::class)->names([
//     'index' => 'user.index',
//     'show' => 'user.show',
//     'edit' => 'user.edit',
// ]);

// //Usa o with trashed apenas na rota show
// Route::resource('/user', UsersController::class)->withTrashed(['show'])->names([
//     'index' => 'user.index',
//     'show' => 'user.show',
//     'edit' => 'user.edit',
// ]);

// //Usa o with trashed em todas as rotas
// Route::resource('/user', UsersController::class)->withTrashed()->names([
//     'index' => 'user.index',
//     'show' => 'user.show',
//     'edit' => 'user.edit',
// ]);

// //Cria apenas index, show e edit ... ->except faz o contrario
// Route::resource('/user', UsersController::class)->only([
//     'index',
//     'show',
//     'edit'
// ]);

//Cria apenas index, show e edit ... ->except faz o contrario
// Route::resource('/user', UsersController::class)->only([
//     'index',
//     'show',
// ])->parameters([
//     'show' => 'user'
// ])->names([
//     'index' => 'user.index',
//     'show' => 'user.show',
// ]);

//Para o caso de estar criando uma api
// Route::apiResource('/user', UsersController::class);
