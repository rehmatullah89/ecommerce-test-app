<?php

namespace App\Interfaces\Repositories;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function getProductById($productId);
}
