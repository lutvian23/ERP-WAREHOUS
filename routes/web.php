<?php

use App\Http\Controllers\customerController;
use App\Http\Controllers\itemsController;
use App\Http\Controllers\recordsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('App/index');
});

Route::get('/home/stock', function () {
    return view('page/content_ddStock');
});

Route::get('/stock', function () {
    return view('page/dashboard_stock');
});

Route::get('/stock/list', function () {
    return view('page/stock');
});

Route::get('/customer', [customerController::class, 'index']);

Route::get('/api/customer', [customerController::class, 'customer_data'])->name('customer.data');
Route::post('/customer/add', [customerController::class, 'store'])->name('customer.store');
Route::get('/customer/{id}/edit', [customerController::class, 'edit'])->name('customer.edit');
Route::put('/customer/{code_cus}/update', [customerController::class, 'update'])->name('customer.update');
Route::delete('/customer/{code_cus}/delete', [customerController::class, 'destroy'])->name('customer.delete');

Route::get('/items/api',[itemsController::class,'index'])->name('items.data');
Route::post('/items/add',[itemsController::class,'store'])->name('items.store');

Route::get('/api/record',[recordsController::class,'index'])->name('record.data');
Route::get('/api/status/stock',[itemsController::class,'statusStock'])->name('record.status');
