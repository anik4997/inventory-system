<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ShowJournalEntryController;

Route::get('/', [ProductController::class,'index'])->name('product.index');
Route::post('/product/store', [ProductController::class,'store'])->name('product.store');
Route::get('/sale/create', [SaleController::class,'create'])->name('sale.create');
Route::post('/sale/store', [SaleController::class,'store'])->name('sale.store');
Route::get('/report', [ReportController::class,'index'])->name('report.index');
Route::get('/journal-entries', [ShowJournalEntryController::class, 'index'])->name('journal.index');