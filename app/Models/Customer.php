<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['Name','Phone','Add','DateOfJoin','DateOfSeparate', 'NID','NidPhoto','Level', 'CustRole'];
//Accessor for changing Level value to Text
    public function getLevelTextAttribute()
    {
        return match ($this->Level) {
            0 => 'under',
            1 => 'upper',
            default => 'unknown',
        };
    }
  

    public function things()
    {
        // return $this->hasMany(Thing::class);
    }

    public function financials()
    {
        return $this->hasMany(Financial::class);
    }
}
