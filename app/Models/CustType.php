<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustType extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['CustType'];
    protected $dates = ['deleted_at'];

    public function customer()
    {
        
         return $this->hasManyThrough(CustType::class,'id','CustType');
    }
}
