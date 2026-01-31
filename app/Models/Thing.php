<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'type',
        'model',
        'amount',
        'unit_price',
        'detail',
        'date'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
