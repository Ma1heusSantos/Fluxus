<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Outflow extends Model
{
    use HasFactory;
    protected $filable = ['name','value','method','desk_id'];


    public function Desk(): BelongsTo
    {
        return $this->belongsTo(Desk::class);
    }
}