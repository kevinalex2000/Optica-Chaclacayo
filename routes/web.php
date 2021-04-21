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

/* RUTAS DE MODULO CLIENTES */

Route::resource('/clients', '\App\Http\Controllers\ClientController');
//Route::get('/clients', [App\Http\Controllers\ClientController::class, 'index'])->name('clients');
//Route::get('/clients/add', [App\Http\Controllers\ClientController::class, 'viewNewClient'])->name('newClient');

/* FIN DE RUTAS DE MODULO CLIENTES */