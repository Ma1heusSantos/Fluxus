<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entry extends Model
{
    protected $filable = ['name','value','method','desk_id'];


    public function Desk(): BelongsTo
    {
        return $this->belongsTo(Desk::class);
    }
}