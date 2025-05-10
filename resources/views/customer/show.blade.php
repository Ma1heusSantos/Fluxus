@extends('layouts.template')

@section('content')
    <!-- Main -->
    <main class="flex-1 p-6">
        <!-- Top bar -->
        <div class="flex flex-row-reverse justify-between items-center mb-6">
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
            </div>
        </div>

        <!-- Botão adicionar -->
        <div class="flex justify-end mb-6">
            <button id="openModal"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-lg shadow transition-all duration-300">
                + Adicionar Cliente
            </button>
        </div>

        <livewire:customer.show>

    </main>
@endsection



<!-- Modal -->
<div id="modal"
    class="fixed inset-0 bg-black bg-opacity-40 {{ $errors->any() ? 'flex' : 'hidden' }} items-center justify-center z-50 transition-all duration-300">
    <div
        class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-lg relative animate-fade-in max-h-[90vh] overflow-y-auto hide-scrollbar">

        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Adicionar Cliente</h2>

        <form action="{{ route('customer.create') }}" method="post">
            @csrf
            <!-- Nome -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold text-gray-700 ">Nome</label>
                <input name="name" type="text" id="name" value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
            </div>
            @error('name')
                <p class="text-red-500 text-sm mb-1">{{ $message }}</p>
            @enderror

            <!-- CPF -->
            <div class="mb-4">
                <label for="cpf" class="block text-sm font-semibold text-gray-700 ">CPF</label>
                <input name="cpf" type="text" id="cpf" value="{{ old('cpf') }}"
                    class="cpf w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
            </div>
            @error('cpf')
                <p class="text-red-500 text-sm mb-1">{{ $message }}</p>
            @enderror

            <!-- Telefone -->
            <div class="mb-4">
                <label for="phone" class="block text-sm font-semibold text-gray-700 ">Telefone</label>
                <input name="phone" type="text" id="phone" value="{{ old('phone') }}"
                    class="phone w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
            </div>
            @error('phone')
                <p class="text-red-500 text-sm mb-1">{{ $message }}</p>
            @enderror

            <!-- Endereço - Rua -->
            <div class="mb-4">
                <label for="street" class="block text-sm font-semibold text-gray-700 ">Rua</label>
                <input name="street" type="text" id="street" value="{{ old('street') }}"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
            </div>
            @error('street')
                <p class="text-red-500 text-sm mb-1">{{ $message }}</p>
            @enderror


            <!-- Endereço - cep e numero -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="number" class="block text-sm font-semibold text-gray-700 ">Número</label>
                    <input name="number" type="text" id="number" value="{{ old('number') }}"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
                    @error('number')
                        <p class="text-red-500 text-sm mb-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="code" class="block text-sm font-semibold text-gray-700 ">CEP</label>
                    <input name="code" type="text" id="code" value="{{ old('code') }}"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
                    @error('code')
                        <p class="text-red-500 text-sm mb-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- Endereço - Cidade e Estado -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="city" class="block text-sm font-semibold text-gray-700 ">Cidade</label>
                    <input name="city" type="text" id="city" value="{{ old('city') }}"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
                    @error('city')
                        <p class="text-red-500 text-sm mb-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="state" class="block text-sm font-semibold text-gray-700 ">Estado</label>
                    <input name="state" type="text" id="state" value="{{ old('state') }}"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
                    @error('state')
                        <p class="text-red-500 text-sm mb-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- Endereço - Bairro -->
            <div class="mb-4">
                <label for="neighborhood" class="block text-sm font-semibold text-gray-700 ">Bairro</label>
                <input name="neighborhood" type="text" id="neighborhood" value="{{ old('neighborhood') }}"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
                @error('neighborhood')
                    <p class="text-red-500 text-sm mb-1">{{ $message }}</p>
                @enderror
            </div>


            <!-- Endereço - commplemento -->
            <div class="mb-4">
                <label for="complement" class="block text-sm font-semibold text-gray-700 ">Complemento</label>
                <input name="complement" type="text" id="complement" value="{{ old('complement') }}"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
                @error('complement')
                    <p class="text-red-500 text-sm mb-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Observações -->
            <div class="mb-6">
                <label for="observation" class="block text-sm font-semibold text-gray-700 ">Observações</label>
                <textarea name="observation" id="observation" rows="3" value="{{ old('observation') }}"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"></textarea>
                @error('observation')
                    <p class="text-red-500 text-sm mb-1">{{ $message }}</p>
                @enderror
            </div>


            <!-- Ações -->
            <div class="flex justify-end gap-3">
                <button id="closeModal"
                    class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">Cancelar</button>
                <button type="submit"
                    class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">Salvar</button>
            </div>
        </form>
    </div>
</div>

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
        const openBtn = document.getElementById("openModal");
        const closeBtn = document.getElementById("closeModal");
        const modal = document.getElementById("modal");

        openBtn.addEventListener("click", () => {
            modal.classList.remove("hidden");
            modal.classList.add("flex");
        });

        closeBtn.addEventListener("click", () => {
            modal.classList.add("hidden");
            modal.classList.remove("flex");
        });

        modal.addEventListener("click", (e) => {
            if (e.target === modal) {
                modal.classList.add("hidden");
                modal.classList.remove("flex");
            }
        });
    });
</script>
