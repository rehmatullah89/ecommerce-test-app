<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'price', 'stock', 'image'
    ];

    public function cartItems()
    {
        return $this->hasManyThrough(
            CartItem::class,
            User::class,
            'id', // Foreign key on users table
            'product_id', // Foreign key on cart_items table
            'id', // Local key on products table
            'id' // Local key on users table
        );
    }
}
