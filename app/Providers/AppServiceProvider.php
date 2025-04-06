<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Repositories\{
    ProductRepositoryInterface,
    OrderRepositoryInterface,
    UserRepositoryInterface
};

use App\Repositories\{
    ProductRepository,
    OrderRepository,
    UserRepository
};

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

       $this->app->bind(
            \App\Interfaces\Services\CartServiceInterface::class,
            \App\Services\CartService::class
        );
        
        $this->app->bind(
            \App\Interfaces\Repositories\CartRepositoryInterface::class,
            \App\Repositories\CartRepository::class
        ); 
    }
}