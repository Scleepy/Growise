<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['TotalAmount', 'UserID', 'hasCheckedOut'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function promo()
    {
        return $this->hasOne(Promo::class, 'PromoID');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'CartID');
    }
}
