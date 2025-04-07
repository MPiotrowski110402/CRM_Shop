<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('layout');
});
// Główna lista klientów
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

// Formularz dodawania klienta
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');

// Zapisywanie nowego klienta
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');

// Edycja klienta
Route::get('/clients/{id}/client_edit', [ClientController::class, 'edit'])->name('clients.client_edit');
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');

// Usuwanie klienta
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

Route::get('/client_description/{id}', [ClientController::class, 'client_description'])->name('client_description');
Route::get('/client_segmentation', [ClientController::class, 'client_segmentation'])->name('client_segmentation');
Route::get('/communication', [ClientController::class, 'communication'])->name('communication');
Route::get('/purchase_history', [ClientController::class, 'purchase_history'])->name('purchase_history');




////////////////////////////////////////////////////////////////
/////////////////////Produkty///////////////////////////////////

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/productProcess/{id}', [ProductController::class, 'productProcess'])->name('products.productProcess');
Route::get('/productInProgress', [ProductController::class, 'productInProgress'])->name('products.productInProgress');
Route::patch('/product/{id}/shipped', [ProductController::class, 'markAsShipped'])->name('products.markAsShipped');
Route::patch('/product/{id}/finished', [ProductController::class, 'markAsFinish'])->name('products.markAsFinish');
Route::get('/productHistory', [ProductController::class, 'productHistory'])->name('products.productHistory');
Route::get('/products/{id}/print-label', [ProductController::class, 'printLabel'])->name('orders.printLabel');


