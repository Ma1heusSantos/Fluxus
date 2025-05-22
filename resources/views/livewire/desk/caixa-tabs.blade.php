<div>
    <div class="flex justify-between">
        <div class="ml-4">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                <li class="me-2">
                    <a href="#" wire:click.prevent="selecionarTab('contas')"
                        class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group
                   {{ $tabSelecionada === 'contas' ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' }}">
                        Contas a Receber
                    </a>
                </li>
                <li class="me-2">
                    <a href="#" wire:click.prevent="selecionarTab('entrada')"
                        class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group
                   {{ $tabSelecionada === 'entrada' ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' }}">
                        Entrada
                    </a>
                </li>
                <li class="me-2">
                    <a href="#" wire:click.prevent="selecionarTab('saida')"
                        class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group
                   {{ $tabSelecionada === 'saida' ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' }}">
                        Saída
                    </a>
                </li>
            </ul>
        </div>
        <div class="mt-4 mr-4">
            <a href='{{ route('close.desk', [$desk->id]) }}'
                class="bg-red-600 hover:bg-red-700 text-white font-medium px-5 py-2 rounded-lg shadow transition-all duration-300">
                Fechar caixa
            </a>
        </div>

    </div>

    {{-- Conteúdo da Tab --}}
    <div class="p-4">
        @if ($tabSelecionada === 'entrada')
            @livewire('desk.entrada', ['desk' => $desk])
        @elseif($tabSelecionada === 'saida')
            @livewire('desk.saida', ['desk' => $desk])
        @elseif($tabSelecionada === 'contas')
            @livewire('desk.contas-recebidas', ['desk' => $desk])
        @endif
    </div>
</div>
