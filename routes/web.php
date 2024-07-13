<?php

use App\Http\Controllers\customerController;
use App\Http\Controllers\itemsController;
use App\Http\Controllers\levelstockController;
use App\Http\Controllers\productController;
use App\Http\Controllers\recordsController;
use App\Http\Controllers\stockControlController;
use App\Http\Controllers\truckController;
use Illuminate\Support\Facades\Route;

// ROUTE VIEW
Route::get('/', function () { return view('App/index');});
Route::get('/home/stock', function () {return view('page/content_ddStock');});
Route::get('/stock', function () {return view('page/dashboard_stock');});
Route::get('/stock/list', function () {return view('page/stock');});
Route::get('/adjustlevel',function() {return view('page/adjustLevel');});
Route::get('/form/levelStock', function() {return view('page/formAdjustLevelStock');});
Route::get('/product',function() { return view('page/product'); });
Route::get('/truck',function() { return view('page/truck'); });
Route::get('/truck/table',function() { return view('page/truckTable'); });


Route::get('/customer', [customerController::class, 'index']);
Route::get('/api/customer', [customerController::class, 'customer_data'])->name('customer.data');
Route::post('/customer/add', [customerController::class, 'store'])->name('customer.store');
Route::get('/customer/{id}/edit', [customerController::class, 'edit'])->name('customer.edit');
Route::put('/customer/{code_cus}/update', [customerController::class, 'update'])->name('customer.update');
Route::delete('/customer/{code_cus}/delete', [customerController::class, 'destroy'])->name('customer.delete');


// ROUTE ITEM
Route::get('/items/api',[itemsController::class,'index'])->name('items.data');
Route::post('/items/add',[itemsController::class,'store'])->name('items.store');

// ROUTE RECORD ITEM
Route::get('/api/record',[recordsController::class,'index'])->name('record.data');
Route::get('/api/status/stock',[itemsController::class,'statusStock'])->name('record.status');


// ROUTE LEVELSTOCK
Route::get('/idLevelStock',[levelstockController::class,'updateIdLevel']);
Route::get('/levelstock/record/data',[levelstockController::class,'levelStockData'])->name('levelstockRecord.data');
Route::get('/levelstock/data',[levelstockController::class,'index'])->name('levelstock.data');
Route::post('/levelstock/add',[levelstockController::class,'storeStockControl'])->name('levelstock.store');
Route::post('/detailproblem/add',[levelstockController::class,'storeDetailProblem'])->name('detaillevelstock.store');
Route::delete('levelstock/destroy/{id}',[levelstockController::class, 'destroyLevelStock'])->name("levelstock.destroy");
Route::delete('detaillevelstock/destroy/{id}',[levelstockController::class, 'destroyDetailLevelStock'])->name("detaillevelstock.destroy");


// ROUTE PRODUCT
Route::get('/product/data',[productController::class, 'index'])->name('product.data');
Route::get('/product/{id_item}/edit',[productController::class, 'edit'])->name('product.edit');
Route::put('/product/{part_number}/update',[productController::class, 'update'])->name('product.update');
Route::delete('/product/destroy/{part_number}',[productController::class, 'destroy'])->name('product.destroy');
Route::post('/product/add',[productController::class, 'store'])->name('product.store');


// ROUTE TRUCK
Route::get('/truck/data',[truckController::class, 'index'])->name('truck.data');
Route::post('/rotation/add',[truckController::class, 'store'])->name('rotation.store');