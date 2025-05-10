<div>
    <div class="ml-4">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
            <li class="me-2">
                <a href="#" wire:click.prevent="selecionarTab('sale')"
                    class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group
                   {{ $tabSelecionada === 'sale' ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' }}">
                    Venda Parcelada
                </a>
            </li>
            <li class="me-2">
                <a href="#" wire:click.prevent="selecionarTab('entrada')"
                    class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group
                   {{ $tabSelecionada === 'quickSale' ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' }}">
                    Venda rápida
                </a>
            </li>
        </ul>
    </div>

    {{-- Conteúdo da Tab --}}
    <div class="p-4">
        @if ($tabSelecionada === 'sale')
            @livewire('desk.entry.sale', ['desk' => $desk])
        @elseif($tabSelecionada === 'quickSale')
            @livewire('desk.entry.quick-sale', ['desk' => $desk])
        @endif
    </div>
</div>
