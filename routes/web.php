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


Auth::routes();

Route::get('/', function () {
    return redirect('login');
});

/* Cancelando ruta Register */
Route::get('/register', function () {
    return redirect('login');
});
/* Cancelando ruta password/reset */
Route::get('/password/reset', function () {
    return redirect('login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/users', '\App\Http\Controllers\UserController');

Route::resource('/clients', '\App\Http\Controllers\ClientController');

Route::resource('/appointment', '\App\Http\Controllers\AppointmentController');
