<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Desk extends Model
{
    use HasFactory;
    protected $fillable = ['date'];


    public function entries(): HasMany
    {
        return $this->hasMany(Entry::class);
    }
    
    public function outflows(): HasMany
    {
        return $this->hasMany(Entry::class);
    }
}