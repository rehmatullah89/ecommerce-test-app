<?php

<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = auth()->user()->cartItems()->with('product')->get();
        
        return response()->json([
            'items' => $cartItems->map(function ($item) {
                return [
                    'id' => $item->product_id,
                    'name' => $item->product->name,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity
                ];
            })
        ]);
    }

    public function addItem(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $user = auth()->user();
        $product = Product::find($request->product_id);

        $cartItem = $user->cartItems()->updateOrCreate(
            ['product_id' => $product->id],
            ['quantity' => \DB::raw("quantity + {$request->quantity}")]
        );

        return response()->json([
            'message' => 'Product added to cart',
            'item' => $cartItem
        ]);
    }
}