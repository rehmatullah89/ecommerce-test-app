<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::post('api/login', 'AuthController@login');
Route::get('api/products', 'ProductController@index');
Route::post('api/checkout', 'OrderController@checkout');

Route::get('api/cart', 'CartController@index');
Route::post('api/cart/add', 'CartController@addItem');
Route::post('api/cart/remove', 'CartController@removeItem');