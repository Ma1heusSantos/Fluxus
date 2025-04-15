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

        <!-- Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-4 rounded shadow">
                <div class="text-gray-500 text-sm">Total Clientes</div>
                <div class="text-2xl font-bold">156</div>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <div class="text-gray-500 text-sm">Contas Ativas</div>
                <div class="text-2xl font-bold">289</div>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <div class="flex items-center justify-between">
                    <div class="text-gray-500 text-sm">Total Recebido</div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path
                            d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z"
                            clip-rule="evenodd" />
                    </svg>

                </div>

                <div class="text-2xl font-bold">R$ 45.678,90</div>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <div class="text-gray-500 text-sm">A Receber</div>
                <div class="text-2xl font-bold">R$ 12.345,67</div>
            </div>
        </div>
        @foreach ($desks as $desk)
            <div class="bg-white p-6 rounded shadow mb-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold">
                        {{ \Carbon\Carbon::parse($desk->date)->translatedFormat('j \d\e F \d\e Y') }}
                    </h2>
                    <button class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-gray-700">Ver Caixa</button>
                </div>
            </div>
        @endforeach
    </main>
@endsection
