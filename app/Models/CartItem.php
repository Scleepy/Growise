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
        'Subtotal'
    ];

    protected $guarded = [
        'CartID',
        'ProductID'
    ];
}
