<?php

namespace App\Livewire\Bill;

use App\Models\Bill;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        $bills = Bill::with('desk')->with('customer')->get();
        return view('livewire.bill.show',['bills'=>$bills]);
    }
}