@extends('layouts.template')

@section('content')
    <div class="flex-1 p-6">
        <!-- Entradas -->
        <div class="bg-white p-6 rounded shadow mb-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Entradas</h2>
                <div class="flex justify-end mb-6">

                </div>
            </div>
            <div class="overflow-x-auto">
                <livewire:desk.entry.entry-tabs :desk="$desk" :methodsPayment="$methodsPayment">
            </div>
        </div>
    </div>
@endsection
