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
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Admin routes
Route::middleware(['auth', 'user-access:admin'])->group(function(){
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

// Manager routes
Route::middleware(['auth', 'user-access:manager'])->group(function(){
    Route::get('/manager/home', [HomeController::class, 'adminHome'])->name('manager.home');
    // redirect /home to /manager/home
    Route::get('/home', function(){
        return redirect('/manager/home');
    });
    
    // manager books
    Route::get('/manager/books', [BookController::class, 'index'])->name('books.index');

    // manager create books
    Route::get('/manager/books/create', [BookController::class, 'createBook'])->name('books.create');
    Route::post('/manager/books/create', [BookController::class, 'storeBook'])->name('books.store');

    // manager update book
    Route::get('/manager/books/{id}/update', [BookController::class, 'updateBook'])->name('books.update');
    Route::put('/manager/books/{id}/update', [BookController::class, 'editBook'])->name('books.edit');
    
    // manager delete book
    Route::delete('/manager/books/{id}/delete', [BookController::class, 'deleteBook'])->name('books.delete');
});
