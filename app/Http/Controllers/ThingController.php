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
        'unitPrice'   => 'required|numeric|min:0',
        'detail'      => 'nullable|string',
        'date'        => 'required|date',
    ]);

    // 2️⃣ Create Thing record
    Thing::create([
        'customer_id' => $validated['customer_id'],
        'type'        => $validated['type'],
        'model'       => $validated['model'],
        'amount'      => $validated['amount'],
        'unit_price'   => $validated['unitPrice'],
        'detail'      => $validated['detail'] ?? null,
        'date'        => $validated['date'],
    ]);

    // 3️⃣ Redirect with success message
    return redirect()
        ->back()
        ->with('success', 'Thing added successfully.');
}
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $things = Thing::where('customer_id', $id)->get();
        foreach ($things as $thing) {
            $sum = $thing->amount* $thing->unit_price;
            $thing->sum = $sum;
        }

        return view('frontend.thing.show', compact('things'));
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
