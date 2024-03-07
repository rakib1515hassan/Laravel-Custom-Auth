<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customAuth;
use App\Http\Controllers\ProductController;

// Include your custom authentication routes
include_once 'custom/auth.php';
// include_once 'product/product.php';


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/product-create', [ProductController::class, 'ProdCreate'])->name('product-create');
Route::post('/product-store', [ProductController::class, 'ProdStore'])->name('product-store');


