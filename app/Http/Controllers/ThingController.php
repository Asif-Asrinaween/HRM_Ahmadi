<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Thing;

use Illuminate\Http\Request;

class ThingController extends Controller
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
    public function create()
    {
        $customers = Customer::all();
        return view('frontend.thing.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1️⃣ Validate input
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'type'        => 'required|boolean',
            'model'       => 'required|string|max:255',
            'amount'      => 'required|integer|min:1',
            'unit_price'   => 'required|numeric|min:0',
            'detail'      => 'nullable|string',
            'date'        => 'required|date',
        ]);

        // 2️⃣ Create Thing record
        Thing::create([
            'customer_id' => $validated['customer_id'],
            'type'        => $validated['type'],
            'model'       => $validated['model'],
            'amount'      => $validated['amount'],
            'unit_price'   => $validated['unit_price'],
            'detail'      => $validated['detail'] ?? null,
            'date'        => $validated['date'],
        ]);

        // 3️⃣ Redirect with success message
        return redirect()
            ->route('Customer.thing')
            ->with('success', 'Thing added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $things = Thing::where('customer_id', $id)
            ->orderBy('id', 'desc') // newest first
            ->paginate(3); // 10 per page (change as needed)

        foreach ($things as $thing) {
            $thing->sum = $thing->amount * $thing->unit_price;
        }

        return view('frontend.thing.show', compact('things'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $thing = Thing::findOrFail($id);
        $customers = Customer::all();
        return view('frontend.thing.edit', compact('thing', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1️⃣ Validate input
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'type'        => 'required|boolean',
            'model'       => 'required|string|max:255',
            'amount'      => 'required|integer|min:1',
            'unit_price'   => 'required|numeric|min:0',
            'detail'      => 'nullable|string',
            'date'        => 'required|date',
        ]);

        // 2️⃣ Find and update Thing record
        $thing = Thing::findOrFail($id);
        $thing->update([
            'customer_id' => $validated['customer_id'],
            'type'        => $validated['type'],
            'model'       => $validated['model'],
            'amount'      => $validated['amount'],
            'unit_price'   => $validated['unit_price'],
            'detail'      => $validated['detail'] ?? null,
            'date'        => $validated['date'],
        ]);

        // 3️⃣ Redirect with success message

        return redirect()
            ->route('things.show', ['thing' => $thing->customer_id])
            ->with('success', 'The record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $thing = Thing::findOrFail($id);
        $customerId = $thing->customer_id;
        $thing->delete();

        return redirect()
            ->route('things.show', ['thing' => $customerId])
            ->with('success', 'The record deleted successfully.');
    }

    // display list of soft deleted or trashed or destroyed customers
    public function trashed()
    {
        $things = Thing::onlyTrashed()->get();


        return view('frontend.thing.trashed', compact('things'));
    }

    //restore a trashed record and go back thing show of that customer
    public function restore($id)
    {

        $thing = Thing::withTrashed()->findOrFail($id);
        $thing->restore();
        return redirect()->route('things.show', ['thing' => $thing->customer_id])
            ->with('success', 'The record restorded successfully!');
    }
    // delete trashed record permanently and go back to thing show of that customer
    public function delete($id)
    {
        $thing = Thing::withTrashed()->findOrFail($id);
        $customer_id = $thing->customer_id;
        $thing->forceDelete();

        return redirect()->route('things.show', ['thing' => $customer_id])
            ->with('success', 'The record deleted permenantly!');
    }
}
