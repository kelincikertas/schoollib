<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


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

// redirect
Route::get('/', function () { return redirect('/home'); });
Route::get('/admin', function () { return redirect('/admin/home'); });

// public
Route::get('/home', [HomeController::class, 'homePage']);
Route::get('/book/{bookid}', [HomeController::class, 'bookPage']);

// admin
Route::get('/admin/home', [AdminController::class, 'homePage']);

// Route::get('/admin/user', [AdminController::class, 'userPage']);
Route::get('/admin/add-user', [AdminController::class, 'addUserPage']);
Route::get('/admin/update-user/{userid}', [AdminController::class, 'updateUserPage']);
Route::get('/admin/delete-user/{userid}', [AdminController::class, 'deleteUser']);

// Route::get('/admin/book/{bookid}', [AdminController::class, 'bookPage']);
Route::get('/admin/add-book', [AdminController::class, 'addBookPage']);
Route::get('/admin/update-book/{bookid}', [AdminController::class, 'updateBookPage']);
Route::get('/admin/delete-book/{bookid}', [AdminController::class, 'deleteBook']);

Route::post('/admin/add-user', [AdminController::class, 'addUser']); 
Route::post('/admin/update-user', [AdminController::class, 'updateUser']); 
Route::post('/admin/add-book', [AdminController::class, 'addBook']); 
Route::post('/admin/update-book', [AdminController::class, 'updateBook']); 

// auth
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
