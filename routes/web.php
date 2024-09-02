<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // dd(Category::get());
    return view('neworder',[
        'categories'=>Category::get()
    ]);
})->name('neworder');
