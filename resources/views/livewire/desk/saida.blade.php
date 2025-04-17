        <!-- Saidas -->
        <div class="bg-white p-6 rounded shadow">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Saidas</h2>
                <button class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-gray-700">Cadastrar</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b text-gray-500">
                            <th class="py-2">CLIENTE</th>
                            <th>VALOR</th>
                            <th>PARCELAS</th>
                            <th>STATUS</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 flex items-center gap-2">
                                <img src="{{ asset('image/men.png') }}" class="w-6 h-6 rounded-full" />
                                João Silva
                            </td>
                            <td>R$ 1.500,00</td>
                            <td>6/12</td>
                            <td><span class="text-xs text-white bg-green-500 px-2 py-1 rounded">Em dia</span></td>
                            <td><span class="text-xl cursor-pointer">&#8942;</span></td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 flex items-center gap-2">
                                <img src="{{ asset('image/woman.png') }}" class="w-6 h-6 rounded-full" />
                                Maria Santos
                            </td>
                            <td>R$ 2.800,00</td>
                            <td>3/24</td>
                            <td><span class="text-xs text-white bg-yellow-400 px-2 py-1 rounded">Pendente</span></td>
                            <td><span class="text-xl cursor-pointer">&#8942;</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
