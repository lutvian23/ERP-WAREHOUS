<?php

use App\Http\Controllers\customerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('App/index');
});

Route::get('/stock', function () {
    return view('page/stock');
});
Route::get('/order', function () {
    return view('page/order');
});
Route::get('/customer', [customerController::class, 'index']);

Route::get('/api/customer', [customerController::class, 'customer_data'])->name('customer.data');
Route::post('/customer/add', [customerController::class, 'store'])->name('customer.store');
Route::get('/customer/{id}/edit', [customerController::class, 'edit'])->name('customer.edit');
Route::put('/customer/{id}', [customerController::class, 'update'])->name('customer.update');
Route::delete('/customer/{id}', [customerController::class, 'delete'])->name('customer.delete');
