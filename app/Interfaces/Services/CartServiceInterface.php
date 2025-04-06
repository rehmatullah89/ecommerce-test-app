<?php

namespace App\Interfaces\Services;

interface CartServiceInterface
{
    public function getCartItems();
    public function addToCart(array $data);
    public function removeFromCart(int $productId);
    public function clearCart();
}