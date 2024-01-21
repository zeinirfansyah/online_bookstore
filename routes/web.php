<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Normal user Routes
Route::middleware(['auth', 'user-access:customer'])->group(function(){
    Route::get('/customer', [HomeController::class, 'index'])->name('customer.home');
});


// Admin and manager routes
Route::middleware(['auth', 'user-access:admin'])->group(function(){
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::prefix('/admin/books')->group(function () {
        Route::get('/', [BookController::class, 'index'])->name('books.index');
        Route::get('/create', [BookController::class, 'createBook'])->name('books.create');
        Route::post('/create', [BookController::class, 'storeBook'])->name('books.store');
        Route::get('/{id}/update', [BookController::class, 'updateBook'])->name('books.update');
        Route::put('/{id}/update', [BookController::class, 'editBook'])->name('books.edit');
        Route::delete('/{id}/delete', [BookController::class, 'deleteBook'])->name('books.delete');
    });
});

// Manager only
Route::middleware(['auth', 'user-access:manager'])->group(function(){
    Route::get('/manager', [HomeController::class, 'adminHome'])->name('manager.home');
});


