<?php

namespace App\Services;

use App\Interfaces\Repositories\CartRepositoryInterface;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Interfaces\Services\CartServiceInterface;

class CartService implements CartServiceInterface
{
    protected $cartRepository;
    protected $productRepository;

    public function __construct(
        CartRepositoryInterface $cartRepository,
        ProductRepositoryInterface $productRepository
    ) {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }

    public function getCartItems()
    {
        return $this->cartRepository->getUserCartItems(auth()->id());
    }

    public function addToCart(array $data)
    {
        $product = $this->productRepository->getProductById($data['product_id']);
        
        if (!$product) {
            throw new \Exception('Product not found');
        }

        return $this->cartRepository->updateOrCreateCartItem([
            'user_id' => auth()->id(),
            'product_id' => $data['product_id'],
            'quantity' => $data['quantity']
        ]);
    }

    public function removeFromCart(int $productId)
    {
        return $this->cartRepository->deleteCartItem(
            auth()->id(),
            $productId
        );
    }

    public function clearCart()
    {
        return $this->cartRepository->clearUserCart(auth()->id());
    }
}