<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'ProductName',
        'Description',

        // Impact towards environment
        'ITE',

        'Price',
        'StockQuantity',
        'ProductImage',
        'GalleryImages'
    ];

    protected $guarded = [
        'PromoID',
        'CategoryID'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryID');
    }

    public function promo()
    {
        return $this->hasOne(Promo::class, 'PromoID');
    }

    public function cartItem()
    {
        return $this->hasOne(CartItem::class, 'ProductID');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'ProductID');
    }

    public function transactionDetails()
    {
        return $this->belongsTo(TransactionDetails::class, 'ProductID');
    }
}
