<?php

namespace App\Http\Controllers;

use App\Interfaces\Services\CartServiceInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartServiceInterface $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        return response()->json([
            'items' => $this->cartService->getCartItems()
        ]);
    }

    public function addItem(Request $request)
    {
        // Manual validation
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $cartItem = $this->cartService->addToCart($request->all());
            return response()->json([
                'message' => 'Product added to cart',
                'item' => $cartItem
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}