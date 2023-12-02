<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'PromoName',
        'DiscountPercentage',
        'ExpirationDate',
        'IsActive'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'PromoID');
    }

    public function transactionDetail()
    {
        return $this->belongsTo(TransactionDetails::class, 'PromoID');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'PromoID');
    }
}
