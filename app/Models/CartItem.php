<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'Quantity',
        'ItemNotes',
        'Subtotal',
        'CartID',
        'ProductID'
    ];

    protected $guarded = [
        'CartID',
        'ProductID'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'CartID');
    }
}
