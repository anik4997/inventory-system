<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;

Route::get('/', [ProductController::class,'index']);
Route::post('/product/store', [ProductController::class,'store']);
Route::get('/sale/create', [SaleController::class,'create'])->name('sale.create');
Route::post('/sale/store', [SaleController::class,'store']);
