<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = ['name','desk_id','customer_id','date','allotment','product_name','status','expiration_data','value','id_desk_payment'];
    
    public function desk():BelongsTo
    {
        return $this->belongsTo(Desk::class);
    }

    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}