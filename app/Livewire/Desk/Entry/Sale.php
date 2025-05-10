<?php

namespace App\Livewire\Desk\Entry;

use App\Models\Customer;
use Livewire\Component;

class Sale extends Component
{
    public $search;
    public $desk;
    public $methodsPayment;
    public function render()
    {
        $customers = Customer::where('name', 'like', '%' . $this->search . '%')
        ->orWhere('cpf','like','%' . $this->search . '%')
        ->paginate(5);
        return view('livewire.desk.entry.sale',['customers'=>$customers]);
    }
}