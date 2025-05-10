<div class="bg-white p-6 rounded shadow mb-4">
    <input placeholder="Pesquise por um cliente" wire:model.live="search"
        class="w-full border-2 border-grey-500 rounded p-2 mb-4" type="text">
    @if (session()->has('message'))
    @endif
    @if ($customers->isNotEmpty())

        <h1 class="text-lg font-semibold mb-4">Clientes</h1>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b text-gray-500">
                        <th class="py-2 px-4">Nome</th>
                        <th class="text-center">Telefone</th>
                        <th class="text-center">CPF</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr class="border-b hover:bg-gray-100 transition duration-150 ease-in-out">
                            <td class="px-4 py-3 text-gray-700 text-sm whitespace-nowrap">
                                {{ $customer->name }}
                            </td>

                            <td class="px-4 py-3 text-center">
                                <span
                                    class="inline-block text-xs font-semibold text-white bg-green-500 px-3 py-1 rounded-full shadow-sm">
                                    {{ $customer->phone }}
                                </span>
                            </td>

                            <td class="px-4 py-3 text-center">
                                <span
                                    class="inline-block text-xs font-semibold text-white bg-red-500 px-3 py-1 rounded-full shadow-sm">
                                    {{ $customer->cpf }}
                                </span>
                            </td>

                            <!-- Botão estilizado -->
                            <td class="px-4 py-3 text-center">
                                <button
                                    class="openModal bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-lg shadow transition-all duration-300"
                                    data-target="modal-{{ $customer->id }}">
                                    + Adicionar conta
                                </button>

                            </td>
                        </tr>

                        <!-- Modal -->
                        <div id="modal-{{ $customer->id }}"
                            class="fixed inset-0 bg-black bg-opacity-40 {{ $errors->any() ? 'flex' : 'hidden' }} items-center justify-center z-50 transition-all duration-300">
                            <div
                                class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-lg relative animate-fade-in max-h-[90vh] overflow-y-auto hide-scrollbar">

                                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Adicionar Cliente</h2>

                                <form action="{{ route('bill.create') }}" method="post">
                                    @csrf

                                    <input name="desk_id" type="hidden" id="desk_id" value="{{ $desk->id }}" />

                                    <input name="customer_id" type="hidden" id="customer_id"
                                        value="{{ $customer->id }}" />

                                    <!-- entrada -->
                                    <div class="mb-4">
                                        <label for="entry"
                                            class="block text-sm font-semibold text-gray-700 ">Entrada</label>
                                        <input name="entry" type="text" id="entry" value="{{ old('entry') }}"
                                            class="money w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
                                    </div>
                                    @error('entry')
                                        <p class="text-red-500 text-sm mb-1">{{ $message }}</p>
                                    @enderror

                                    <!-- Parcela -->
                                    <div class="mb-4">
                                        <label for="allotment"
                                            class="block text-sm font-semibold text-gray-700 ">Quantidade de
                                            parcelas</label>
                                        <input name="allotment" type="number" id="name"
                                            value="{{ old('allotment') }}"
                                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
                                    </div>
                                    @error('allotment')
                                        <p class="text-red-500 text-sm mb-1">{{ $message }}</p>
                                    @enderror

                                    <!-- valor -->
                                    <div class="mb-4">
                                        <label for="value"
                                            class="block text-sm font-semibold text-gray-700 ">Valor</label>
                                        <input name="value" type="text" id="value" value="{{ old('value') }}"
                                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
                                    </div>
                                    @error('value')
                                        <p class="text-red-500 text-sm mb-1">{{ $message }}</p>
                                    @enderror

                                    <!-- nome do produto -->
                                    <div class="mb-4">
                                        <label for="product_name"
                                            class="block text-sm font-semibold text-gray-700 ">Nome do Produto</label>
                                        <input name="product_name" type="text" id="name"
                                            value="{{ old('product_name') }}"
                                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
                                    </div>
                                    @error('product_name')
                                        <p class="text-red-500 text-sm mb-1">{{ $message }}</p>
                                    @enderror

                                    <!-- metodo de pagamento -->
                                    <div class="mb-4">
                                        <label for="methodsPayment" class="block text-sm font-semibold text-gray-700">
                                            Método de Pagamento
                                        </label>
                                        <select name="methodsPayment" id="methodsPayment"
                                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                                            <option disabled selected value="">Selecione uma opção</option>
                                            @foreach ($methodsPayment as $method)
                                                <option value="{{ $method->id }}"
                                                    {{ old('methodsPayment') == $method->id ? 'selected' : '' }}>
                                                    {{ $method->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Ações -->
                                    <div class="flex justify-end gap-3">
                                        <button type="button"
                                            class="closeModal px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">
                                            Cancelar
                                        </button>
                                        <button type="submit"
                                            class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">Salvar</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="">
            {{ $customers->links() }}
        </div>
    @else
        <p class="text-center mt-4">Nenhum cliente encontrado.</p>
    @endif



    <!-- Animação simples -->
    <style>
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hide-scrollbar {
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* IE e Edge antigo */
        }

        .hide-scrollbar::-webkit-scrollbar {
            width: 0px;
            height: 0px;
            display: none;
            /* Safari, Chrome, Opera */
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".openModal").forEach(button => {
                button.addEventListener("click", () => {
                    const targetId = button.getAttribute("data-target");
                    const modal = document.getElementById(targetId);
                    modal.classList.remove("hidden");
                    modal.classList.add("flex");
                });
            });

            // Fechar qualquer modal
            document.querySelectorAll(".closeModal").forEach(button => {
                button.addEventListener("click", (e) => {
                    e.preventDefault();
                    const modal = button.closest(".fixed");
                    modal.classList.add("hidden");
                    modal.classList.remove("flex");
                    aplicarMascara();
                });
            });

            // Fechar clicando fora do conteúdo
            document.querySelectorAll(".fixed").forEach(modal => {
                modal.addEventListener("click", (e) => {
                    if (e.target === modal) {
                        modal.classList.add("hidden");
                        modal.classList.remove("flex");
                    }
                });
            });
        });
    </script>



</div>
