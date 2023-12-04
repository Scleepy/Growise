<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'Rating',
        'Comment',
        'ReviewDate'
    ];

    protected $guarded = [
        'UserID',
        'ProductID'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID');
    }
}
