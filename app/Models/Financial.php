<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id','detail','currency',
        'credit','debit','date'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
