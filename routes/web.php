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

Route::resource('/users', '\App\Http\Controllers\UserController')->middleware('auth', 'role:1');

Route::resource('/clients', '\App\Http\Controllers\ClientController');

Route::resource('/appointment', '\App\Http\Controllers\AppointmentController');

Route::resource('/products', '\App\Http\Controllers\ProductController');

Route::resource('/office', '\App\Http\Controllers\OfficeController')->middleware('auth', 'role:1');

Route::resource('/sales', '\App\Http\Controllers\SaleController');

Route::get('/pdf/{id_sale}','\App\Http\Controllers\PDFController@PDF')->name('descargarPDF');

// Rutas de Pedidos

Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');

Route::get('/orders/create', [App\Http\Controllers\OrderController::class, 'select_category'])->name('orders.select_category');

Route::get('/orders/create/{idcategory}/{name_category}', [App\Http\Controllers\OrderController::class, 'create'])->name('orders.create');

Route::post('/orders/create/', [App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');

Route::get('/orders/edit/{id}', [App\Http\Controllers\OrderController::class, 'edit'])->name('orders.edit');

Route::put('/orders/{id}', [App\Http\Controllers\OrderController::class, 'update'])->name('orders.update');

Route::delete('/orders/{id}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('orders.destroy');

Route::get('/orders/estado/{id}', [App\Http\Controllers\OrderController::class, 'estado'])->name('orders.estado');

Route::put('/orders/updatestate/{id}', [App\Http\Controllers\OrderController::class, 'updatestate'])->name('orders.updatestate');

Route::get('/reporte', [App\Http\Controllers\ReporteController::class, 'index'])->name('reporte.index');
Route::get('/reportedevolucionespre', [App\Http\Controllers\ReporteController::class, 'reportedevolucionespre'])->name('reporte.reportedevolucionespre');
Route::get('/reportedevolucionespos', [App\Http\Controllers\ReporteController::class, 'reportedevolucionespos'])->name('reporte.reportedevolucionespos');
Route::get('/reporteentregaspre', [App\Http\Controllers\ReporteController::class, 'reporteentregaspre'])->name('reporte.reporteentregaspre');

Route::get('/reporteentregaspos', [App\Http\Controllers\ReporteController::class, 'reporteentregaspos'])->name('reporte.reporteentregaspos');

Route::get('/reporteentregastotales', [App\Http\Controllers\ReporteController::class, 'reporteentregastotales'])->name('reporte.reporteentregastotales');
Route::get('/reportedevolucionestotales', [App\Http\Controllers\ReporteController::class, 'reportedevolucionestotales'])->name('reporte.reportedevolucionestotales');

