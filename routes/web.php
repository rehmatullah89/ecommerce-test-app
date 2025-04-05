<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::post('api/login', [AuthController::class, 'login']);
Route::get('api/products', [ProductController::class, 'index']);
Route::post('api/checkout', [OrderController::class, 'checkout']);

$router->get('/', function () use ($router) {
    return $router->app->version();
});
