<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustType;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.customer.index')
            ->with('customers', Customer::all());
    }

    // display  list of customers in Thing tab
    public function customerThing()
    {
        return view('frontend.thing.customerList')
            ->with('customers', Customer::all());
    }
    
    // display  list of customers in financial tab
    public function customerFinancial()
    {
        return view('frontend.financial.customerList')
            ->with('customers', Customer::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.customer.create')
            ->with('custTypes', CustType::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Customer::create(['Name' => $request->Name, 'Phone' => $request->Phone, 'Add' => $request->Add,  'DateOfJoin' => $request->DateOfJoin,'DateOfSeparate' => $request->DateOfSeparate,'NID' => $request->NID, 'NidPhoto' => $request->NidPhoto, 'Level'=> $request->Level, 'CustRole' => $request->CustRole,]);
        return redirect()->route('Customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('frontend.customer.show')
            ->with('customer', Customer::findOrFail($id));
        // return $customer = Customer::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('frontend.customer.edit')
            ->with('customer', Customer::findOrFail($id))
            ->with('custTypes', CustType::all());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        Customer::where('id', $id)->update(['Name' => $request->Name, 'FatherName' => $request->FatherName, 'Phone' => $request->Phone, 'Email' => $request->Email, 'NID' => $request->NID, 'Add' => $request->Add, 'CustType' => $request->CustType,]);
        return redirect()->route('Customer.show', ['Customer' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Customer $customer)
    // {return $customer;
    //     $customer->delete();
    //     return redirect()->route('Customer.index');
    // }

    public function delete($customer)
    {
        // return $customer;
        $customer = Customer::findOrFail($customer);

        $customer->forceDelete();
        return redirect()->route('Customer.index');
    }
}
