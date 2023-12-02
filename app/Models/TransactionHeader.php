<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'TransactionDate',
        'TotalAmount'
    ];

    protected $guarded = [
        'UserID',
        'ShipmentStatusID'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'TransactionHeaderID');
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetails::class, 'TransactionHeaderID');
    }

    public function shipmentStatus()
    {
        return $this->hasOne(ShipmentStatus::class, 'ShipmentStatusID');
    }
}
