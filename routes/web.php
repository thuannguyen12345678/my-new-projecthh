<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\HomeContrller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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


Route::middleware(['auth', 'PreventBackHistory'])->group(function () {

    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
        Route::get('/dashboard', [TaskController::class, 'haha'])->name('tasks.dashboard');
        Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
        Route::post('/create', [TaskController::class, 'store'])->name('tasks.store');
        Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
        Route::post('/{id}/edit', [TaskController::class, 'update'])->name('tasks.update');
        Route::get('/{id}/destroy', [TaskController::class, 'destroy'])->name('tasks.destroy');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/dashboard', [ProductController::class, 'haha'])->name('products.dashboard');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/create', [ProductController::class, 'store'])->name('products.store');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('/{id}/edit', [ProductController::class, 'update'])->name('products.update');
        Route::get('/{id}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
    });


    //nhan vien
    Route::group(['prefix' => 'staffs'], function () {
        Route::get('/a', [StaffController::class, 'index'])->name('staffs.index');
        Route::get('/dashboard', [StaffController::class, 'haha'])->name('staffs.dashboard');
        Route::get('/create', [StaffController::class, 'create'])->name('staffs.create');
        Route::post('/create', [StaffController::class, 'store'])->name('staffs.store');
        Route::get('/{id}/edit', [StaffController::class, 'edit'])->name('staffs.edit');
        Route::post('/{id}/edit', [StaffController::class, 'update'])->name('staffs.update');
        Route::get('/{id}/destroy', [StaffController::class, 'destroy'])->name('staffs.destroy');
    });
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/dashboard', [CategoryController::class, 'haha'])->name('categories.dashboard');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/{id}/edit', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });

    // Route::get('/login', function () {
    //     return view('logins.login');
    // });
    // Route::get('/register', function () {
    //     return view('logins.register');
    // });

    // Only authenticated users may access this route...


    Route::get('/dashboard', function () {
        return view('tables.dashboard');
    });


   
    Route::get('/logout', [HomeContrller::class, 'logout'])->name('logout');
    
});
Route::get('/login', [HomeContrller::class, 'show_form_login']);
Route::post('/login', [HomeContrller::class, 'login'])->name('login');
Route::get('/register', [HomeContrller::class, 'show_form_register']);
Route::post('/register', [HomeContrller::class, 'register'])->name('register');




//giỏ hàng:
Route::get('/', [CartController::class, 'index'])->name('index');
Route::get('/list', [CartController::class, 'list'])->name('list');

Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove_cart');
Route::get('details-cart', [CartController::class, 'details'])->name('details_cart');
Route::get('stipendium-cart', [CartController::class, 'stipendium'])->name('stipendium_cart');
Route::get('/giay', function () {
       return view('adidas_giay.nike.index');
    });