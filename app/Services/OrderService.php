<?php

namespace App\Services;

use App\Interfaces\Repositories\OrderRepositoryInterface;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    protected $orderRepository;
    protected $productRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        ProductRepositoryInterface $productRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
    }

    public function createOrder(array $orderData)
    {
        $total = 0;
        $items = [];

        foreach ($orderData['items'] as $item) {
            $product = $this->productRepository->getProductById($item['product_id']);
            $items[] = [
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'price_at_purchase' => $product->price
            ];
            $total += $product->price * $item['quantity'];
        }

        $order = $this->orderRepository->createOrder([
            'user_id' => Auth::id(),
            'total_amount' => $total,
            'status' => 'pending'
        ]);

        $order->orderItems()->createMany($items);
        
        return $order;
    }
}