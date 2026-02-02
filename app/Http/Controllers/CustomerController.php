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


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.customer.create');
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
        $customers = Customer::all();
        return view('frontend.financial.customerList')
            ->with('customers', Customer::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Customer::create(['Name' => $request->Name, 'Phone' => $request->Phone, 'Add' => $request->Add,  'DateOfJoin' => $request->DateOfJoin, 'DateOfSeparate' => $request->DateOfSeparate, 'NID' => $request->NID, 'NidPhoto' => $request->NidPhoto, 'Level' => $request->Level, 'CustRole' => $request->CustRole,]);
        return redirect()->route('Customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('frontend.customer.show')
            ->with('customer', Customer::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('frontend.customer.edit')
            ->with('customer', Customer::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        Customer::where('id', $id)->update(['Name' => $request->Name, 'Phone' => $request->Phone, 'Add' => $request->Add,  'DateOfJoin' => $request->DateOfJoin, 'DateOfSeparate' => $request->DateOfSeparate, 'NID' => $request->NID, 'NidPhoto' => $request->NidPhoto, 'Level' => $request->Level, 'CustRole' => $request->CustRole,]);
        return redirect()->route('Customer.show', ['Customer' => $id]);
    }

    /**
     * destroy the specified resource just from view.
     */
    public function destroy(Customer $Customer)
    {

        $Customer->delete();
        return redirect()->route('Customer.index');
    }
    // display list of soft deleted or trashed or destroyed customers
    public function trashed()
    {
        $customers = Customer::onlyTrashed()->get();

        return view('frontend.customer.trashed', compact('customers'));
    }
    // restore soft deleted customer
    public function restore($id)
    {
        $customer = Customer::withTrashed()->findOrFail($id);
        $customer->restore();

        return redirect()->route('Customer.index')
            ->with('success', 'Customer restored successfully.');
    }

    // permanently delete customer from database

    public function delete($id)
    {
        // Find the customer including trashed records
        $customer = Customer::withTrashed()->findOrFail($id);

        // Ensure the customer is trashed before permanently deleting
        if (! $customer->trashed()) {
            return redirect()->back()
                ->with('error', 'Customer must be soft-deleted before permanently deleting.');
        }

        $customer->forceDelete();
        
        return redirect()->back()
            ->with('success', 'Customer permanently deleted.');
    }
}
