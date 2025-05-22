<?php

namespace App\Livewire\Bill;

use App\Models\Bill;
use Livewire\Component;

class Show extends Component
{
    public $search;
    public function render()
    {
        $bills = Bill::join('customers', 'bills.customer_id', '=', 'customers.id')
                    ->where('customers.name', 'LIKE', '%' . $this->search . '%')
                    ->orderBy('customers.name', 'asc')
                    ->select('bills.*') 
                    ->with(['desk', 'customer'])
                    ->paginate(10);

        return view('livewire.bill.show', ['bills' => $bills]);
        
    }
}