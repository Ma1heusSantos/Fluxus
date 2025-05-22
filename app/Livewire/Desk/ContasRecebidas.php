<?php

namespace App\Livewire\Desk;

use App\Models\Bill;
use Livewire\Component;

class ContasRecebidas extends Component
{
    public $desk;
    public $search;
    public function render()
    {
        $bills = Bill::where('id_desk_payment', $this->desk->id)
                    ->whereHas('customer', function($q) {
                        $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('cpf', 'like', '%' . $this->search . '%');
                    })
                    ->paginate(10);

            
        return view('livewire.desk.contas-recebidas',['bills'=>$bills]);
    }
}