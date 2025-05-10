<?php

namespace App\Livewire\Desk;

use Livewire\Component;

class CaixaTabs extends Component
{
    public string $tabSelecionada = 'contas';
    public $desk;

    public function selecionarTab(string $tab)
    {
        $this->tabSelecionada = $tab;
    }

    public function render()
    {
        return view('livewire.desk.caixa-tabs');
    }
}