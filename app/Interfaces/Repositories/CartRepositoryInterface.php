<?php

namespace App\Interfaces\Repositories;

interface CartRepositoryInterface
{
    public function getUserCartItems(int $userId);
    public function updateOrCreateCartItem(array $data);
    public function deleteCartItem(int $userId, int $productId);
    public function clearUserCart(int $userId);
}