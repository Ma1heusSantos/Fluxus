<div class="bg-white p-6 rounded shadow mb-4">
    <input placeholder="Pesquise por um caixa" wire:model.live="search"
        class="w-full border-2 border-grey-500 rounded p-2 mb-4" type="date">
    @if (session()->has('message'))
    @endif
    @if ($desks->isNotEmpty())
        <div class="bg-white p-6 rounded shadow mb-4">
            <h1 class="text-lg font-semibold mb-4">Caixas</h1>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b text-gray-500">
                            <th class="py-2 px-4">Data</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($desks as $desk)
                            <tr class="border-b hover:bg-gray-100 transition duration-150 ease-in-out">
                                <td class="px-4 py-3 text-gray-700 text-sm whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($desk->date)->translatedFormat('j \d\e F \d\e Y') }}
                                </td>
                                @if ($desk->status == 'open')
                                    <td class="px-4 py-3 text-center">
                                        <span
                                            class="inline-block text-xs font-semibold text-white bg-green-500 px-3 py-1 rounded-full shadow-sm">
                                            {{ $desk->status }}
                                        </span>
                                    </td>
                                @else
                                    <td class="px-4 py-3 text-center">
                                        <span
                                            class="inline-block text-xs font-semibold text-white bg-red-500 px-3 py-1 rounded-full shadow-sm">
                                            {{ $desk->status }}
                                        </span>
                                    </td>
                                @endif

                                <!-- Botão estilizado -->
                                <td class="px-4 py-3 text-center">
                                    <a href="{{ route('desk.details', $desk->id) }}"
                                        class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-gray-700">Ver
                                        Caixa</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div>
            {{ $desks->links() }}
        </div>
    @else
        <p class="text-center mt-4">Nenhum cliente encontrado.</p>
    @endif
</div>
