<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index']);
Route::get('/shopping-cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/tracking', [HomeController::class, 'tracking'])->name('tracking');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/product-detail/{id}', [HomeController::class, 'productDetail'])->name('product.detail');

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/admin/product', [ProductController::class, 'index']);
Route::post('/admin/product/add', [ProductController::class, 'add'])->name('product.add');
Route::post('/admin/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/admin/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::get('/admin/order', [AdminController::class, 'order']);
Route::get('/admin/payment', [AdminController::class, 'payment']);
Route::get('/admin/delivery', [AdminController::class, 'delivery']);
Route::get('/admin/user', [AdminController::class, 'user']);
