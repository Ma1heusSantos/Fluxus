<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MethodPayment extends Model
{
    use HasFactory;
    protected $fillable = ['description'];

    public function entry():BelongsTo{
        return $this->belongsTo(Entry::class);
    }

    public function outflow():BelongsTo{
        return $this->belongsTo(Outflow::class);
    }
}