<?php

use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    // dd(Category::get());
    return view('neworder',[
        'categories'=>Category::get()
    ]);
})->name('neworder');

Route::get('/orders', [OrderController::class, 'index'])->name('history');
Route::get('orders/{order_id}', [OrderController::class, 'showOrderProducts'])->name('admin.order-product');
