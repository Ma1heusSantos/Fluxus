<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','cpf','observation'];


    public function Address(): HasOne
    {
        return $this->hasOne(Address::class);
    }
}