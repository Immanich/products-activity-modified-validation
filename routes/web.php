<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function() { 
    return view('home');
});

Route::get('/about', function() { return view('about');});
Route::get('/product', function() { return view('products');});
Route::get('/contact', function() { return view('contact');});

Route::get('/open', [ProductController::class, 'open']);

Route::post('/create-product', [ProductController::class, 'store'])->name('create.product');

Route::get('/close-button', [ProductController::class, 'close'])->name('close.button');

Route::get('/message', [ProductController::class, 'message'])->name('message');

Route::get('/error', [ProductController::class, 'error'])->name('error');

