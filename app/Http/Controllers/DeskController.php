<?php

namespace App\Http\Controllers;

use App\Models\Desk;
use App\Models\Entry;
use App\Models\MethodPayment;
use App\Models\Outflow;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DeskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function createEntry($id)
    {
        $desk = Desk::find($id);
        $methodsPayment = MethodPayment::all();
        return view('desk.entry.create',['desk'=>$desk,'methodsPayment'=>$methodsPayment]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function newDesk(){
        return view('desk.newDesk');
    }

    public function quickSale(Request $request){
        $request->validate([
            "value" => "required|numeric|min:0.01",
            "product_name" => "required|string|max:255",
        ]);
        
        try{
            Entry::create([
                'product_name'=>$request->product_name,
                'value'=>$request->value,
                'method_id'=> $request->methodsPayment,
                'desk_id'=> $request->desk_id
            ]);

            session()->flash('global-success',true);
            session()->flash('message', 'Venda criada com sucesso!');
            return redirect()->route('desk.details',$request->desk_id);
            
        }catch(Exception $e){
            Log::error('Erro ao criar venda: ' . $e->getMessage());

            session()->flash('global-error', true);
            session()->flash('message', 'Ocorreu um erro ao processar a venda.');
    
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
    public function show()
    {
        $desks = Desk::all();
        return view('desk.show',['desks'=>$desks]);
    }

    public function details($id){
        $desk = Desk::with('entries')->with('bills')->with('outflows')->find($id);
        return view('desk.details',['desk'=>$desk]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}