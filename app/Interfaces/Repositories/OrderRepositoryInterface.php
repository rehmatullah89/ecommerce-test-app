<?php

namespace App\Interfaces\Repositories;

interface OrderRepositoryInterface
{
    public function createOrder(array $orderDetails);
    public function getOrderById($orderId);
}