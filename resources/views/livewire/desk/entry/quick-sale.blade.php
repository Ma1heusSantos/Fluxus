<div class="mt-4 w-full max-w-lg relative animate-fade-in max-h-[90vh] overflow-y-auto hide-scrollbar">
    @if (session()->has('message'))
    @endif

    <h2 class="text-lg font-semibold mb-4">Venda rápida</h2>

    <form action="{{ route('bill.quickSale') }}" method="post">
        @csrf

        <input name="desk_id" type="hidden" id="desk_id" value="{{ $desk->id }}" />

        <!-- valor -->
        <div class="mb-4">
            <label for="value" class="block text-sm font-semibold text-gray-700 ">Valor</label>
            <input name="value" type="text" id="value" value="{{ old('value') }}"
                class="money w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
        </div>
        @error('value')
            <p class="text-red-500 text-sm mb-1">{{ $message }}</p>
        @enderror

        <!-- nome do produto -->
        <div class="mb-4">
            <label for="product_name" class="block text-sm font-semibold text-gray-700 ">Nome do Produto</label>
            <input name="product_name" type="text" id="name" value="{{ old('product_name') }}"
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
            <select required name="methodsPayment" id="methodsPayment"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                <option disabled selected value="">Selecione uma opção</option>
                @foreach ($methodsPayment as $method)
                    <option value="{{ $method->id }}" {{ old('methodsPayment') == $method->id ? 'selected' : '' }}>
                        {{ $method->description }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Botão de envio -->
        <div class="pt-4">
            <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                Criar venda rápida
            </button>
        </div>
    </form>

</div>
