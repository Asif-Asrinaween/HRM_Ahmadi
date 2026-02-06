<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thing extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'customer_id',
        'type',
        'model',
        'amount',
        'unit_price',
        'model_image',
        'detail',
        'date'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
