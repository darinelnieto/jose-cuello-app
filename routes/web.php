<?php

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\OrderController::class, 'index'])->name('home');

// users modulo

Route::get('/users/index', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

Route::get('/users/create/view', [App\Http\Controllers\UserController::class, 'viewCreateUsers'])->name('view.create.users');

Route::post('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');

Route::get('/users/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');

Route::put('/users/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');

Route::post('/users/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

// user individual

Route::get('/users/editIndividual', [App\Http\Controllers\UserController::class, 'editIndividual'])->name('users.editIndividual');

Route::put('/users/updateIndividual', [App\Http\Controllers\UserController::class, 'updateIndividual'])->name('users.updateIndividual');

// file 

Route::post('/edit/file', [App\Http\Controllers\UserController::class, 'fileEdit'])->name('edit.file');

// create orden

Route::post('/create/order', [App\Http\Controllers\OrderController::class, 'create'])->name('create.order');

Route::post('/edit/order', [App\Http\Controllers\OrderController::class, 'edit'])->name('edit.order');

Route::post('/assign/order', [App\Http\Controllers\OrderController::class, 'assignOrder'])->name('assign.order');

Route::get('/view/order', [App\Http\Controllers\OrderController::class, 'viewOrder'])->name('view.order');

Route::get('/search/order', [App\Http\Controllers\OrderController::class, 'search'])->name('search.order');