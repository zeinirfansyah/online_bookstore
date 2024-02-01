<?php

use App\Http\Controllers\BookCategoriesController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDataController;
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

Route::middleware(['auth'])->group(function(){
    //    all user routes
    Route::get('/customer', [HomeController::class, 'index'])->name('customer.home');

    // Admin and manager routes
    Route::middleware(['auth', 'user-access:admin,manager'])->group(function(){
        Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');

        Route::prefix('admin/profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('profile.show');
            Route::get('/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
            Route::put('/update', [ProfileController::class, 'editProfile'])->name('profile.edit');
        });

        Route::prefix('/admin/books')->group(function () {
            Route::get('/', [BookController::class, 'index'])->name('books.index');
            Route::get('/create', [BookController::class, 'createBook'])->name('books.create');
            Route::post('/create', [BookController::class, 'storeBook'])->name('books.store');
            Route::get('/{id}/update', [BookController::class, 'updateBook'])->name('books.update');
            Route::put('/{id}/update', [BookController::class, 'editBook'])->name('books.edit');
            Route::delete('/{id}/delete', [BookController::class, 'deleteBook'])->name('books.delete');
        });

        Route::prefix('/admin/book_categories')->group(function () {
            Route::get('/', [BookCategoryController::class, 'index'])->name('book_categories.index');
            Route::get('/create', [BookCategoryController::class, 'createBookCategory'])->name('book_categories.create');
            Route::post('/create', [BookCategoryController::class, 'storeBookCategory'])->name('book_categories.store');
            Route::get('/{id}/update', [BookCategoryController::class, 'updateBookCategory'])->name('book_categories.update');
            Route::put('/{id}/update', [BookCategoryController::class, 'editBookCategory'])->name('book_categories.edit');
            Route::delete('/{id}/delete', [BookCategoryController::class, 'deleteBookCategory'])->name('book_categories.delete');
          
        });
    });

    // Manager only
    Route::middleware(['auth', 'user-access:manager'])->group(function(){
        Route::get('/manager/users-management', [UserDataController::class, 'index'])->name('users.index');
        Route::delete('/{id}/delete', [UserDataController::class, 'deleteUser'])->name('users.delete');
        Route::get('/{id}/detail', [UserDataController::class, 'detailUser'])->name('users.detail');
        Route::get('/{id}/update', [UserDataController::class, 'updateUser'])->name('users.update');
        Route::put('/{id}/update', [UserDataController::class, 'editUser'])->name('users.edit');
    });

});




