<?php

namespace App\Services;

use App\Interfaces\Repositories\ProductRepositoryInterface;

class ProductService
{
    protected $products;

    public function __construct(ProductRepositoryInterface $products) {
        $this->products = $products;
    }

    public function getAllProducts() {
        return $this->products->getAllProducts();
    }

    // public function create(array $data) {
    //     return $this->products->create($data);
    // }

    public function getProductById(int $id) {
        return $this->products->getProductById($id);
    }

    // public function update(int $id, array $data) {
    //     return $this->products->update($id, $data);
    // }

    // public function delete(int $id) {
    //     return $this->products->delete($id);
    // }
}
