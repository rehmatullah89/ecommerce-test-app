<?php

namespace App\Repositories;

use App\Interfaces\Repositories\OrderRepositoryInterface;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{
    public function createOrder(array $orderDetails)
    {
        return Order::create($orderDetails);
    }

    public function getOrderById($orderId)
    {
        return Order::findOrFail($orderId);
    }
}