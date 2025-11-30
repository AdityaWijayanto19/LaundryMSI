<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/orders', function () {
    return view('admin.orders.index');
})->name('admin.orders.index');

