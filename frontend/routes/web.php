<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OwnerController;
use App\Http\Middleware\Owner;
use Illuminate\Support\Facades\Route;

route::get('/', [HomeController::class, 'home'])->name('home');

route::get('/home', [HomeController::class, 'login_home'])->
    middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

// Dashboard Admin
route::get('admin/dashboard', [HomeController::class, 'admin'])->
    middleware(['auth', 'admin']);
route::get('admin/order_list', [AdminController::class, 'order_list'])->
    middleware(['auth', 'admin']);

route::get('admin/view_category', [AdminController::class, 'view_category'])->
    middleware(['auth', 'admin']);
route::post('admin/add_category', [AdminController::class, 'add_category'])->
    middleware(['auth', 'admin']);
route::get('admin/edit_category/{id}', [AdminController::class, 'edit_category'])->
    middleware(['auth', 'admin']);
route::put('admin/update_category/{id}', [AdminController::class, 'update_category'])->
    middleware(['auth', 'admin']);
Route::delete('admin/delete_category/{id}', [AdminController::class, 'delete_category'])->
    middleware(['auth', 'admin']);
// route::post('admin/delete_category/{id}', [AdminController::class, 'delete_category'])->
//     middleware(['auth', 'admin']);

// Dashboard Owner

route::get('owner/dashboard', [HomeController::class, 'owner'])->
    middleware(['auth', 'owner']);
route::get('owner/view_costume', [OwnerController::class, 'view_costume'])->
    middleware(['auth', 'owner']);
route::get('owner/add_costume', [OwnerController::class, 'add_costume'])->
    middleware(['auth', 'owner']);
route::post('owner/upload_costume', [OwnerController::class, 'upload_costume'])->
    middleware(['auth', 'owner']);
route::get('owner/edit_costume/{id}', [OwnerController::class, 'edit_costume'])->
    middleware(['auth', 'owner']);
route::post('owner/update_costume/{id}', [OwnerController::class, 'update_costume'])->
    middleware(['auth', 'owner']);
route::get('owner/delete_costume/{id}', [OwnerController::class, 'delete_costume'])->
    middleware(['auth', 'owner']);

route::get('owner/order_list', [OwnerController::class, 'order_list'])->
    middleware(['auth', 'owner']);
route::get('owner/dikirim/{id}', [OwnerController::class, 'dikirim'])->
    middleware(['auth', 'owner']);
route::get('owner/selesai/{id}', [OwnerController::class, 'selesai'])->
    middleware(['auth', 'owner']);

// Renter
route::get('costume_details/{id}', [HomeController::class, 'costume_details']);
route::get('search', [HomeController::class, 'search']);
route::get('shop_details/{id}', [HomeController::class, 'shop_details']);

route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->
    middleware(['auth', 'verified']);
route::get('mycart', [HomeController::class, 'mycart'])->
    middleware(['auth', 'verified']);
route::get('delete_cart/{id}', [HomeController::class, 'delete_cart'])->
    middleware(['auth', 'verified']);
route::get('checkout', [HomeController::class, 'checkout'])->
    middleware(['auth', 'verified']);
route::post('confirm_order', [HomeController::class, 'confirm_order'])->
    middleware(['auth', 'verified']);

route::get('myorder', [HomeController::class, 'myorder'])->
    middleware(['auth', 'verified']);
route::get('diterima/{id}', [HomeController::class, 'diterima'])->
    middleware(['auth', 'verified']);
route::get('dikembalikan/{id}', [HomeController::class, 'dikembalikan'])->
    middleware(['auth', 'verified']);