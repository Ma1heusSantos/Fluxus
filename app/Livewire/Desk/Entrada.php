<?php

namespace App\Livewire\Desk;

use App\Models\Desk;
use Livewire\Component;

class Entrada extends Component
{
    public $desk;

    public function removeEntry($id)
    {
        $entry = $this->desk->entries()->find($id);
    
        if ($entry) {
            $entry->delete();
    
            session()->flash('global-success', 'Entrada removida com sucesso!');
        } else {
            session()->flash('global-error', 'Entrada não encontrada.');
        }
        //preciso emitir um evendo para o componente pai para que a pagina seja atualizada quando remover a entrada.
    }
    
    public function render()
    {
        $entries = $this->desk->entries()->with(['customer','method_payment'])->paginate(10);

        return view('livewire.desk.entrada',['entries'=>$entries]);
    }
}