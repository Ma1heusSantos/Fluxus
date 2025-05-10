<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Outflow extends Model
{
    use HasFactory;
    protected $fillable = ['name','value','method_id','desk_id'];


    public function Desk(): BelongsTo
    {
        return $this->belongsTo(Desk::class);
    }
    
    public function method_payment(): BelongsTo
    {
        return $this->belongsTo(MethodPayment::class, 'method_id');
    }
}