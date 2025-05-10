<?php

namespace App\Livewire\Desk;

use App\Models\Desk;
use Carbon\Carbon;
use Livewire\Component;

class NewDesk extends Component
{
    public $total = 0;
    public function render()
    {
        $desk = Desk::create([
            'date' => Carbon::now()->toDateString(),
            'status'=> 'open'
        ]);
        
        return view('livewire.desk.new-desk',['desk'=>$desk]);
    }

    public function addToTotal($value){
        $this->total += $value;
    }

    public function subToTotal($value){
        $this->total -= $value;
    }
}