<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Entry extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','value','method_id','desk_id'];


    public function Desk(): BelongsTo
    {
        return $this->belongsTo(Desk::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function method_payment(): BelongsTo
    {
        return $this->belongsTo(MethodPayment::class, 'method_id');
    }
    

}