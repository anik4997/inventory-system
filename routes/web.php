<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ReportController;

Route::get('/', [ProductController::class,'index'])->name('product.index');
Route::post('/product/store', [ProductController::class,'store'])->name('product.store');
Route::get('/sale/create', [SaleController::class,'create'])->name('sale.create');
Route::post('/sale/store', [SaleController::class,'store']);
Route::get('/report', [ReportController::class,'index'])->name('report.index');
