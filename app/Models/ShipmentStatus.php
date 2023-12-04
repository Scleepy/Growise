<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'ShipmentDate'
    ];

    protected $guarded = [
        'StatusID'
    ];

    public function transaction()
    {
        return $this->belongsTo(TransactionHeader::class, 'ShipmentStatusID');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'StatusID');
    }
}
