<?php

use App\Http\Controllers\customerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('App/index');
});

Route::get('/stock', function () {
    return view('page/stock');
});
Route::get('/customer', function () {
    return view('page/customer');
});
Route::get('/order', function () {
    return view('page/order');
});

Route::resource('/api/customer', customerController::class);
Route::get('/customer/{id}/edit', [customerController::class, 'edit'])->name('customer.edit');
Route::put('/customer/{id}', [customerController::class, 'update'])->name('customer.update');
Route::delete('/customer/{id}', [customerController::class, 'delete'])->name('customer.delete');
