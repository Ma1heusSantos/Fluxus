<?php

namespace App\Livewire\Desk;

use App\Models\Desk;
use Livewire\Component;

class Show extends Component
{
    public $search;
    public function render()
    {
        $desks = Desk::where('date', 'like', '%' . $this->search . '%')
            ->orderBy('date', 'desc')
            ->paginate(5);

        return view('livewire.desk.show',['desks'=>$desks]);
    }
}