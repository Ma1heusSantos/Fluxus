<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Desk;
use App\Models\Entry;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class billController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    function isHoliday(Carbon $date, array $holidays): bool
    {
        return in_array($date->format('Y-m-d'), $holidays);
    }

    function getNextBusinessDay(Carbon $date, array $holidays): Carbon
    {
        while ($date->isWeekend() || $this->isHoliday($date, $holidays)) {
            $date->addDay();
        }
        return $date;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $holidays = [
            '2025-01-01', // Ano novo
            '2025-04-21', // Tiradentes
            '2025-05-01', // Dia do trabalho
            '2025-09-07', // Independência
            '2025-10-12', // Nossa Senhora Aparecida
            '2025-11-02', // Finados
            '2025-11-15', // Proclamação da República
            '2025-12-25', // Natal
        ];

        $request->validate([
            "entry" => "nullable|string",
            "allotment" => "required|integer|min:1",
            "value" => "required|numeric|min:0.01",
            "product_name" => "required|string|max:255",
        ]);
        

        $allotment = (int) $request->allotment;

        
        try{

            $startDate = Carbon::now();

            for ($i = 0; $i < $allotment; $i++) {
                $expiration_date = $startDate->copy()->addDays(30 * $i);
                $expiration_date = $this->getNextBusinessDay($expiration_date, $holidays);

                Bill::create([
                    'date' => now()->format('Y/m/d'),
                    'status' => 'pendente',
                    'desk_id' => $request->desk_id,
                    'expiration_data' => $expiration_date->format('Y-m-d'),
                    'customer_id' => $request->customer_id,
                    'entry' => $request->entry,
                    'allotment' => $request->allotment,
                    'value' => $request->value,
                    'product_name' => $request->product_name
                ]);
            }

            if($request->entry != null){
                Entry::create([
                    'customer_id'=>$request->customer_id,
                    'value'=>$request->entry,
                    'method_id'=> $request->methodsPayment,
                    'desk_id'=> $request->desk_id
                ]);
            }
        
            session()->flash('global-success',true);
            session()->flash('message', 'Conta criada com sucesso!');
            return redirect()->route('customer.show');
            
        }catch(Exception $e){
            Log::error('Erro ao criar conta: ' . $e->getMessage());

            session()->flash('global-error', true);
            session()->flash('message', 'Ocorreu um erro ao criar a conta.');
    
            return redirect()->back()->withInput();
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bill $bill)
    {
        return view('bill.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        //
    }
}