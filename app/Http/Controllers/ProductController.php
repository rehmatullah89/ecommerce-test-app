<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $products;

    public function __construct(ProductService $products) {
        $this->products = $products;
    }

    public function index() {
        return $this->products->getAllProducts();
    }

    public function store(Request $request) {
        return response()->json($this->products->create($request->all()), 201);
    }

    public function show($id) {
        return $this->products->get($id);
    }

    public function update(Request $request, $id) {
        return $this->products->update($id, $request->all());
    }

    public function destroy($id) {
        return response()->json($this->products->delete($id), 204);
    }
}
