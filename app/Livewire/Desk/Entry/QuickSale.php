<?php

namespace App\Livewire\Desk\Entry;

use Livewire\Component;

class QuickSale extends Component
{
    public $desk;
    public $methodsPayment;
    public function render()
    {
        return view('livewire.desk.entry.quick-sale');
    }
}