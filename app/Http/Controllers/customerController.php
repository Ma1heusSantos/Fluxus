<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'street' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'city' => 'required|string|max:100',
            'neighborhood' => 'required|string|max:100',
            'complement' => 'nullable|string|max:100',
            'code' => 'required|string|max:10', 
            'state' => 'required|string|size:2', 
        
            'name' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^\(?\d{2}\)?[\s-]?\d{4,5}-?\d{4}$/',
            'cpf' => 'required|string|size:11|unique:customers,cpf',
        ]);

        
        try{
            $address = Address::create([
                'street'=> $request->street,
                'number'=> $request->number,
                'city'=> $request->city,
                'neighborhood'=> $request->neighborhood,
                'complement'=> $request->complement,
                'code'=>$request->code,
                'state'=>$request->state
                
            ]);
            Customer::create([
                'name'=> $request->name,
                'phone'=> $request->phone,
                'cpf'=> $request->cpf,
                'address_id'=> $address->id,
            ]);

            return redirect()->route('customer.show');
            
        }catch(Exception $e){
            Log::error($e->getMessage());
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
        $customer = Customer::all();
        return view('customer.show',['customer'=>$customer]);
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