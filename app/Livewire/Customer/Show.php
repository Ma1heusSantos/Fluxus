<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Exception;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Show extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        try{
            $customers = Customer::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('cpf', 'like', '%' . $this->search . '%')
            ->paginate(5);

            return view('livewire.customer.show',['customers'=>$customers]);
       }catch(Exception $e){
            Log::info($e->getMessage());
            $customer = collect();
       }
    }
    
}