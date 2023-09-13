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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'postRegister']);
});

Route::get('/home', function () {
    return redirect('/admin/dashboard');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware('accessLevel:admin');

    Route::get('/admin/category', [CategoryController::class, 'index'])->middleware('accessLevel:admin');
    Route::post('/admin/category/add', [CategoryController::class, 'add'])->name('category.add')->middleware('accessLevel:admin');
    Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('category.update')->middleware('accessLevel:admin');
    Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete')->middleware('accessLevel:admin');

    Route::get('/admin/product', [ProductController::class, 'index'])->middleware('accessLevel:admin');
    Route::post('/admin/product/add', [ProductController::class, 'add'])->name('product.add')->middleware('accessLevel:admin');
    Route::post('/admin/product/update/{id}', [ProductController::class, 'update'])->name('product.update')->middleware('accessLevel:admin');
    Route::get('/admin/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete')->middleware('accessLevel:admin');

    Route::get('/admin/payment', [PaymentController::class, 'index'])->middleware('accessLevel:admin');
    Route::post('/admin/payment/add', [PaymentController::class, 'add'])->name('payment.add')->middleware('accessLevel:admin');
    Route::post('/admin/payment/update/{id}', [PaymentController::class, 'update'])->name('payment.update')->middleware('accessLevel:admin');
    Route::get('/admin/payment/delete/{id}', [PaymentController::class, 'delete'])->name('payment.delete')->middleware('accessLevel:admin');

    Route::get('/admin/delivery', [DeliveryController::class, 'index'])->middleware('accessLevel:admin');
    Route::post('/admin/delivery/add', [DeliveryController::class, 'add'])->name('delivery.add')->middleware('accessLevel:admin');
    Route::post('/admin/delivery/update/{id}', [DeliveryController::class, 'update'])->name('delivery.update')->middleware('accessLevel:admin');
    Route::get('/admin/delivery/delete/{id}', [DeliveryController::class, 'delete'])->name('delivery.delete')->middleware('accessLevel:admin');

    Route::get('/admin/user', [UserController::class, 'index'])->middleware('accessLevel:admin');
    Route::post('/admin/user/add', [UserController::class, 'add'])->name('user.add')->middleware('accessLevel:admin');
    Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('user.update')->middleware('accessLevel:admin');
    Route::get('/admin/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete')->middleware('accessLevel:admin');

    Route::get('/shopping-cart', [HomeController::class, 'cart'])->name('cart')->middleware('accessLevel:customer');
    Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->middleware('accessLevel:customer');
    Route::get('checkout', [ProductController::class, 'checkout'])->middleware('accessLevel:customer');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/tracking', [HomeController::class, 'tracking'])->name('tracking');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/product-detail/{id}', [HomeController::class, 'productDetail'])->name('product.detail');
