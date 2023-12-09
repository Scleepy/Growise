<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OWOAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'Balance'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
