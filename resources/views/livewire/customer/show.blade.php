<div class="bg-white p-6 rounded shadow mb-4">
    <input placeholder="Pesquise por um cliente" wire:model.live="search"
        class="w-full border border-gray-300 rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
        type="text">

    @if ($customers->isNotEmpty())
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white text-sm rounded border">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="py-3 px-4 text-left">Cliente</th>
                        <th class="py-3 px-4 text-left">Telefone</th>
                        <th class="py-3 px-4 text-left">CPF</th>
                        <th class="py-3 px-4 text-left">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $cost)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="py-3 px-4 flex items-center gap-3">
                                <img src="{{ asset('image/men.png') }}" class="w-10 h-10 rounded-full border" />
                                <span class="font-medium">{{ $cost->name }}</span>
                            </td>
                            <td class="py-3 px-4">{{ $cost->phone }}</td>
                            <td class="py-3 px-4">{{ $cost->cpf }}</td>
                            <td class="py-3 px-4">
                                <div class="flex gap-3">

                                    <!-- Detalhes -->
                                    <button class="text-blue-600 hover:text-blue-800 transition" title="Detalhes"
                                        aria-label="Ver detalhes">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 3a7 7 0 100 14 7 7 0 000-14zM9 7h2v5H9V7zm0 6h2v2H9v-2z" />
                                        </svg>
                                    </button>

                                    <!-- Editar -->
                                    <a href="#" class="text-yellow-500 hover:text-yellow-600 transition"
                                        title="Editar" aria-label="Editar cliente">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L6 11.172V14h2.828l8.586-8.586a2 2 0 000-2.828z" />
                                        </svg>
                                    </a>

                                    <!-- Excluir -->
                                    <a href="{{ route('customer.destroy', $cost->id) }}"
                                        class="text-red-600 hover:text-red-800 transition" title="Excluir"
                                        aria-label="Excluir cliente">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 0 0-1 1v1H3a1 1 0 0 0 0 2h1v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2h-2V3a1 1 0 0 0-1-1H6Zm0 4v10h8V6H6Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $customers->links() }}
            </div>
        </div>
    @else
        <p class="text-center text-gray-500 mt-6">Nenhum cliente encontrado.</p>
    @endif
</div>
