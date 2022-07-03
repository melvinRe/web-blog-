<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('welcome');
Route::get('/single/{id}', [App\Http\Controllers\FrontController::class, 'single'])->name('single');
Route::get('/about', [App\Http\Controllers\FrontController::class, 'about'])->name('about');
Route::get('/kontak', [App\Http\Controllers\FrontController::class, 'kontak'])->name('kontak');
Route::post('/store', [App\Http\Controllers\FrontController::class, 'store'])->name('store');
Route::get('/topik', [App\Http\Controllers\FrontController::class, 'topik'])->name('topik');
Route::get('/spesifik/{topik}', [App\Http\Controllers\FrontController::class, 'spesifik'])->name('spesifik');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/add-user', [App\Http\Controllers\UserController::class, 'add'])->name('add-user');
Route::post('/store-user', [App\Http\Controllers\UserController::class, 'store'])->name('store-user');
Route::get('/edit-user/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit-user');
Route::post('/update-user', [App\Http\Controllers\UserController::class, 'update'])->name('update-user');
Route::get('/delete-user/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('delete-user');

Route::get('/posting', [App\Http\Controllers\PostingController::class, 'index'])->name('posting');
Route::get('/add-posting', [App\Http\Controllers\PostingController::class, 'add'])->name('add-posting');
Route::post('/store-posting', [App\Http\Controllers\PostingController::class, 'store'])->name('store-posting');
Route::get('/edit-posting/{id}', [App\Http\Controllers\postingController::class, 'edit'])->name('edit-posting');
Route::post('/update-posting', [App\Http\Controllers\PostingController::class, 'update'])->name('update-posting');
Route::get('/delete-posting/{id}', [App\Http\Controllers\PostingController::class, 'delete'])->name('delete-posting');

Route::get('/konfigurasi', [App\Http\Controllers\KonfigurasiController::class, 'index'])->name('konfigurasi');
Route::get('/add-konfigurasi', [App\Http\Controllers\KonfigurasiController::class, 'add'])->name('add-konfigurasi');
Route::post('/store-konfigurasi', [App\Http\Controllers\KonfigurasiController::class, 'store'])->name('store-konfigurasi');
Route::get('/edit-konfigurasi/{id}', [App\Http\Controllers\KonfigurasiController::class, 'edit'])->name('edit-konfigurasi');
Route::post('/update-konfigurasi', [App\Http\Controllers\KonfigurasiController::class, 'update'])->name('update-konfigurasi');
Route::get('/delete-konfigurasi/{id}', [App\Http\Controllers\KonfigurasiController::class, 'delete'])->name('delete-konfigurasi');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/add-contact', [App\Http\Controllers\ContactController::class, 'add'])->name('add-contact');
Route::post('/store-contact', [App\Http\Controllers\ContactController::class, 'store'])->name('store-contact');
Route::get('/edit-contact/{id}', [App\Http\Controllers\ContactController::class, 'edit'])->name('edit-contact');
Route::post('/update-contact', [App\Http\Controllers\ContactController::class, 'update'])->name('update-contact');
Route::get('/delete-contact/{id}', [App\Http\Controllers\ContactController::class, 'delete'])->name('delete-contact');