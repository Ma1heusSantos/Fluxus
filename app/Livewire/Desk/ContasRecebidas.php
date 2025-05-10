<?php

namespace App\Livewire\Desk;

use App\Models\Bill;
use Livewire\Component;

class ContasRecebidas extends Component
{
    public $desk;
    public function render()
    {
        $bills = Bill::where('desk_id',$this->desk->id)->get();
        return view('livewire.desk.contas-recebidas',['bills'=>$bills]);
    }
}