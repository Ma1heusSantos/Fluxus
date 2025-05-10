<?php

namespace App\Livewire\Desk;

use Livewire\Component;

class Details extends Component
{
    public $desk;
    public function render()
    {
        return view('livewire.desk.details');
    }
}