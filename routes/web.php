<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;

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

Route::get('/admin/dashboard', [AdminController::class, 'index']);

Route::get('/admin/category', [CategoryController::class, 'index']);
Route::post('/admin/category/add', [CategoryController::class, 'add'])->name('category.add');
Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

Route::get('/admin/product', [ProductController::class, 'index']);
Route::post('/admin/product/add', [ProductController::class, 'add'])->name('product.add');
Route::post('/admin/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/admin/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

Route::get('/admin/payment', [PaymentController::class, 'index']);
Route::post('/admin/payment/add', [PaymentController::class, 'add'])->name('payment.add');
Route::post('/admin/payment/update/{id}', [PaymentController::class, 'update'])->name('payment.update');
Route::get('/admin/payment/delete/{id}', [PaymentController::class, 'delete'])->name('payment.delete');

Route::get('/admin/delivery', [DeliveryController::class, 'index']);
Route::post('/admin/delivery/add', [DeliveryController::class, 'add'])->name('delivery.add');
Route::post('/admin/delivery/update/{id}', [DeliveryController::class, 'update'])->name('delivery.update');
Route::get('/admin/delivery/delete/{id}', [DeliveryController::class, 'delete'])->name('delivery.delete');

Route::get('/admin/user', [UserController::class, 'index']);
Route::post('/admin/user/add', [UserController::class, 'add'])->name('user.add');
Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/admin/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
