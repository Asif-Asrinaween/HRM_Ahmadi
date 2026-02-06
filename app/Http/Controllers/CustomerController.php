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
        $photoName = null;

        // if photo uploaded
        if ($request->hasFile('NidPhoto')) {

            $file = $request->file('NidPhoto');

            // create unique name
            $photoName = time() . '_' . $file->getClientOriginalName();

            // move to public/images/customerImages folder
            // Validate file type and size (e.g., max 2MB, only jpg/png/jpeg)
            $request->validate([
                'NidPhoto' => 'image|mimes:jpeg,png,jpg,pdf|max:2048',
            ]);

            // Sanitize file name
            $photoName = time() . '_' . preg_replace('/[^a-zA-Z0-9_\.-]/', '', $file->getClientOriginalName());

            // Move to public/images/customerImages folder
            $file->move(public_path('images/customerImages'), $photoName);
        }

        Customer::create([
            'Name' => $request->Name,
            'Phone' => $request->Phone,
            'Add' => $request->Add,
            'DateOfJoin' => $request->DateOfJoin,
            'DateOfSeparate' => $request->DateOfSeparate,
            'NID' => $request->NID,
            'NidPhoto' => $photoName, // save file name
            'Level' => $request->Level,
            'CustRole' => $request->CustRole,
        ]);

        return redirect()->route('Customer.index')
            ->with('success', 'Customer created successfully');
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
    public function update(Request $request, string $id)
    {
        // Validate input including optional NidPhoto
        $validated = $request->validate([
            'Name' => 'required',
            'Phone' => 'required',
            'Add' => 'required|string|min:4|max:30',
            'DateOfJoin' => 'required|date',
            'DateOfSeparate' => 'nullable|date',
            'NID' => 'required|numeric|min:5',
            'NidPhoto' => 'nullable|image|mimes:jpeg,png,jpg,pdf|max:2048',
            'Level' => 'required|boolean',
            'CustRole' => 'required|string',
        ]);
        //find customer to update
        $thing = Customer::findOrFail($id);
        // Handle file upload if present
        $photoName = null;
        if ($request->hasFile('NidPhoto')) {
            $file = $request->file('NidPhoto');
            // Sanitize file name
            $photoName = time() . '_' . preg_replace('/[^a-zA-Z0-9_\.-]/', '', $file->getClientOriginalName());
            //update and Move to public/images/customerImages folder
            $file->move(public_path('images/customerImages'), $photoName);
            $thing->update(['NidPhoto' => $photoName]);
        }

        // 2️⃣ Find and update Thing record
        $thing->update([
            'Name' => $validated['Name'],
            'Phone'        => $validated['Phone'],
            'Add'       => $validated['Add'],
            'DateOfJoin'      => $validated['DateOfJoin'],
            'DateOfSeparate'   => $validated['DateOfSeparate'],
            'NID'      => $validated['NID'],
            'Level'        => $validated['Level'],
            'CustRole'        => $validated['CustRole'],
        ]);

        // 3️⃣ Redirect with success message

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
