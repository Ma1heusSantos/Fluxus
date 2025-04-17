<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Exception;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Show extends Component
{
    public $customer;
    public $search;
    public function render()
    {
        try{
            $this->customer = Customer::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('cpf', 'like', '%' . $this->search . '%')->get();

            return view('livewire.customer.show',['customer'=>$this->customer]);
       }catch(Exception $e){
            Log::info($e->getMessage());
            $this->customer = collect();
       }
    }
    
}