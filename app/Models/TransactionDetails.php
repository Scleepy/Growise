<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'Quantity',
        'ItemNotes',
        'Subtotal',
        'TransactionHeaderID',
        'ProductID',
    ];

    protected $guarded = [
        'TransactionHeaderID',
        'ProductID',
        'PromoID'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID', 'id');
    }

    public function promo()
    {
        return $this->hasOne(Promo::class, 'PromoID');
    }

    public function transaction()
    {
        return $this->belongsTo(TransactionHeader::class, 'TransactionHeaderID');
    }
}
