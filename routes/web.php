<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardBookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('home', [
        "title" => "Beranda",
        "active" => "beranda",
        "books" => BookController::class, "index"
    ]);
});

Route::get('/buku', [BookController::class, "index"]);

// single post
Route::get('buku/{book:slug}', [BookController::class, "show"]);

Route::get('/kategori', function() {
    return view('categories', [
        'title' => 'Kategori',
        'active' => 'kategori',
        'categories' => Category::all()
    ]);
});


Route::get('/masuk', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/masuk', [LoginController::class, 'authenticate']);

Route::post('/keluar', [LoginController::class, 'logout']);

Route::get('/daftar', [RegisterController::class, 'index']);
Route::post('/daftar', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/buku/checkSlug', [DashboardBookController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/buku', DashboardBookController::class)->middleware('auth');

 