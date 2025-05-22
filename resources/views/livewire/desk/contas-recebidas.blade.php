<div class="bg-white p-6 rounded shadow mb-4">
    <input placeholder="Pesquise por uma conta" wire:model.live="search"
        class="w-full border-2 border-grey-500 rounded p-2 mb-4" type="text">
    @if (session()->has('message'))
    @endif

    @if ($bills->isNotEmpty())
        <div class="bg-white p-6 rounded shadow mb-4">
            <h1 class="text-lg font-semibold mb-4">Contas</h1>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b text-gray-500">
                            <th class="py-2 px-4">Parcela</th>
                            <th class="py-2 px-4">Cliente</th>
                            <th class="py-2 px-4">Valor</th>
                            <th class="text-center">Data de vencimento</th>
                            <th class="text-center">Parcela</th>
                            <th class="py-2 px-4 text-center">Produto</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Caixa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bills as $bill)
                            <tr class="border-b hover:bg-gray-100 transition duration-150 ease-in-out">
                                <td class="px-4 py-3 text-gray-700 text-sm whitespace-nowrap">
                                    {{ $bill->name }}
                                </td>
                                <td class="px-4 py-3 text-gray-700 text-sm whitespace-nowrap">
                                    {{ $bill->customer->name }}
                                </td>
                                <td class="px-4 py-3 text-gray-700 text-sm whitespace-nowrap">
                                    {{ 'R$ ' . number_format($bill->value ?? 0, 2, ',', '.') }}
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <span
                                        class="inline-block text-xs font-semibold text-white bg-green-500 px-3 py-1 rounded-full shadow-sm">
                                        {{ \Carbon\Carbon::parse($bill->expiration_data)->translatedFormat('j \d\e F \d\e Y') }}
                                    </span>
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <span class="inline-block text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
                                        {{ $bill->allotment }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <span class="inline-block text-xs font-semibold  px-3 py-1 rounded-full shadow-sm">
                                        {{ $bill->product_name }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    @if ($bill->status == 'pago')
                                        <span
                                            class="inline-block text-xs font-semibold text-white bg-green-500 px-3 py-1 rounded-full shadow-sm">
                                            {{ $bill->status }}
                                        </span>
                                    @else
                                        <span
                                            class="inline-block text-xs font-semibold text-white bg-red-500 px-3 py-1 rounded-full shadow-sm">
                                            {{ $bill->status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <span class="inline-block text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
                                        {{ \Carbon\Carbon::parse($bill->desk->date)->translatedFormat('j \d\e F \d\e Y') }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="">
            {{ $bills->links() }}
        </div>
    @else
        <p class="text-center mt-4">Nenhuma conta cadastrada.</p>
    @endif
</div>
