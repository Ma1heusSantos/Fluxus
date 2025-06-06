<div>
    <!-- Entradas -->
    <div class="bg-white p-6 rounded shadow mb-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Entradas</h2>
            @if ($desk->status == 'open')
                <div class="flex justify-end mb-6">
                    <a href='{{ route('create.entry', $desk->id) }}' id="openModal"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-lg shadow transition-all duration-300">
                        + Adicionar Entradas
                    </a>
                </div>
            @endif
        </div>
        @if ($entries->isNotEmpty())
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b font-bold ">
                            <th>Cliente</th>
                            <th class="text-center">Valor($)</th>
                            <th class="text-center">Método de pagamento</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    @foreach ($entries as $entry)
                        <tbody>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-2 flex items-center gap-2">
                                    {{ $entry->customer->name ?? 'Venda Rápida' }}
                                </td>
                                <td class="text-center">R$ {{ $entry->value }}</td>
                                <td class="text-center">{{ $entry->method_payment->description ?? 'Não informado' }}
                                </td>
                                <td>
                                    <a href="#" wire:click.prevent="removeEntry({{ $entry->id }})"
                                        title="Remover entrada"
                                        class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-red-50 hover:bg-red-100   transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-6">
                                            <path fill-rule="evenodd"
                                                d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>

                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>

            <div>
                {{ $entries->links() }}
            </div>
        @else
            <p class="text-center mt-4">Nenhuma entrada cadastrada.</p>
        @endif
    </div>

</div>
