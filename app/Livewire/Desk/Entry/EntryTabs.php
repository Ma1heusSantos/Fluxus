<?php

namespace App\Livewire\Desk\Entry;

use App\Models\MethodPayment;
use Livewire\Component;

class EntryTabs extends Component
{
    public string $tabSelecionada = 'sale';
    public $desk;
    public $methodsPayment;
    
    public function mount($desk)
    {
        $this->desk = $desk;
        $this->methodsPayment = MethodPayment::all();
    }
    public function selecionarTab(string $tab)
    {
        $this->tabSelecionada = $tab;

    }

    public function render()
    {
        return view('livewire.desk.entry.entry-tabs');
    }
}