<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/index', [BlogController::class, 'index'])->name('index');
Route::get('show/{id}', [BlogController::class, 'show'])->name('show');
Route::delete('delete/{id}', [BlogController::class, 'destroy'])->name('destroy');
Route::get('/create', [BlogController::class, 'create'])->name('create');
Route::post('/store', [BlogController::class, 'store'])->name('store');
Route::get('edit/{id}', [BlogController::class, 'edit'])->name('edit');
Route::put('update/{blog}', [BlogController::class, 'update'])->name('update');

