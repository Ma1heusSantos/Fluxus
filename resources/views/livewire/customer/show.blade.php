<div class="bg-white p-6 rounded shadow mb-4">
    <input placeholder="Pesquise por um cliente" wire:model.live="search"
        class="w-full border-2 border-grey-500 rounded p-2 mb-4" type="text">
    @if (session()->has('message'))
    @endif
    @if ($customers->isNotEmpty())
        <div class="bg-white p-6 rounded shadow mb-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Contas Recebidas</h2>
                <button id="openModal" class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-gray-700">Receber</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b text-gray-500">
                            <th class="py-2">CLIENTE</th>
                            <th>Telefone</th>
                            <th>CPF</th>
                            <th>observação</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $cost)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-2 flex items-center gap-2">
                                    <img src="{{ asset('image/men.png') }}" class="w-12 h-12 rounded-full" />
                                    {{ $cost->name }}
                                </td>
                                <td>{{ $cost->phone }}</td>
                                <td>{{ $cost->cpf }}</td>
                                <td><span
                                        class="text-xs text-white bg-green-500 px-2 py-1 rounded">{{ $cost->observation }}</span>
                                </td>
                                <td>

                                    <button id="dropdownMenuIconHorizontalButton-{{ $cost->id }}"
                                        data-dropdown-toggle="dropdownDotsHorizontal-{{ $cost->id }}"
                                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                        type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 16 3">
                                            <path
                                                d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                        </svg>
                                    </button>

                                    <!-- Dropdown menu -->
                                    <div id="dropdownDotsHorizontal-{{ $cost->id }}"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-xl shadow-lg w-48 dark:bg-gray-800 dark:divide-gray-700">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownMenuIconHorizontalButton-{{ $cost->id }}">
                                            <li>
                                                <a href="{{ route('customer.destroy', $cost->id) }}"
                                                    class="flex items-center gap-2 px-4 py-2 text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors duration-200 dark:hover:bg-red-600 dark:hover:text-white">
                                                    <svg class="w-4 h-4 text-red-500" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 0 0-1 1v1H3a1 1 0 0 0 0 2h1v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2h-2V3a1 1 0 0 0-1-1H6Zm0 4v10h8V6H6Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Excluir
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="flex items-center gap-2 px-4 py-2 text-yellow-600 hover:bg-yellow-50 hover:text-yellow-700 transition-colors duration-200 dark:hover:bg-yellow-600 dark:hover:text-white">
                                                    <svg class="w-4 h-4 text-yellow-500" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M17.414 2.586a2 2 0 0 0-2.828 0L6 11.172V14h2.828l8.586-8.586a2 2 0 0 0 0-2.828zM5 12v3h3l9.586-9.586a4 4 0 1 0-5.656-5.656L5 9v3z" />
                                                    </svg>
                                                    Editar
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="">
            {{ $customers->links() }}
        </div>
    @else
        <p class="text-center mt-4">Nenhum cliente encontrado.</p>
    @endif
</div>
