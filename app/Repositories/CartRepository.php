<?php

namespace App\Repositories;

use App\Interfaces\Repositories\CartRepositoryInterface;
use App\Models\CartItem;

class CartRepository implements CartRepositoryInterface
{
    public function getUserCartItems(int $userId)
    {
        return CartItem::where('user_id', $userId)
            ->with('product')
            ->get()
            ->map(function ($item) {
                return [
                    'product_id' => $item->product_id,
                    'name' => $item->product->name,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity
                ];
            });
    }

    public function updateOrCreateCartItem(array $data)
    {
        return CartItem::updateOrCreate(
            [
                'user_id' => $data['user_id'],
                'product_id' => $data['product_id']
            ],
            ['quantity' => \DB::raw("quantity + {$data['quantity']}")]
        );
    }

    public function deleteCartItem(int $userId, int $productId)
    {
        return CartItem::where('user_id', $userId)
            ->where('product_id', $productId)
            ->delete();
    }

    public function clearUserCart(int $userId)
    {
        return CartItem::where('user_id', $userId)->delete();
    }
}