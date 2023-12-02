<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'PaymentDate',
    ];

    protected $guarded = [
        'UserID',
        'TransactionHeaderID'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function transaction()
    {
        return $this->belongsTo(TransactionHeader::class, 'TransactionHeaderID');
    }
}
