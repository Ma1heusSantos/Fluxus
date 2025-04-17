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

        <div class="col-span-full flex justify-end mb-5">
            <a href="{{ route('newDesk') }}" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-500">Abrir
                novo Caixa</a>
        </div>

        @foreach ($desks as $desk)
            <div class="bg-white p-6 rounded shadow mb-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold">
                        {{ \Carbon\Carbon::parse($desk->date)->translatedFormat('j \d\e F \d\e Y') }}
                    </h2>
                    <p class="text-xs text-white bg-red-500 px-2 py-1 rounded">fechado</p>
                    <button class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-gray-700">Ver Caixa</button>
                </div>
            </div>
        @endforeach
    </main>
@endsection
