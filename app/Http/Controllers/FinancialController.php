<?php

namespace App\Http\Controllers;

use App\Models\Customer;

use Illuminate\Http\Request;
use App\Models\Financial;

class FinancialController extends Controller
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
        return view('frontend.financial.create', compact('customers'));
    }
    // create financial record for specific id
    public function singleCreate($customer_id)
    {

        $customer = Customer::findOrFail($customer_id);
        return view('frontend.financial.singleCreate', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1️⃣ Validate request
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'detail'      => 'nullable|string',
            'currency'    => 'required|string|max:10',
            'credit'      => 'nullable|numeric|min:0',
            'debit'       => 'nullable|numeric|min:0',
            'date'        => 'required|string|max:12',
        ]);

        // 2️⃣ Prevent both credit and debit together:
        if ($validated['credit'] > 0 && $validated['debit'] > 0) {
            return back()
                ->withInput()
                ->with('success', 'Only one of credit or debit is allowed');
        }

        // 3️⃣ Create financial record
        Financial::create([
            'customer_id' => $validated['customer_id'],
            'detail'      => $validated['detail'] ?? null,
            'currency'    => $validated['currency'],
            'credit'      => $validated['credit'] ?? 0,
            'debit'       => $validated['debit'] ?? 0,
            'date'        => $validated['date'],
        ]);

        // 4️⃣ Redirect with success message
        return redirect()
            ->route('Customer.financial')
            ->with('success', 'Financial record added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $customer_id)
    {
        $customerFinancials = Financial::where('customer_id', $customer_id)->get();

        $totalCredit = 0;
        $totalDebit  = 0;
        $balance     = 0;
        $finalStatus = 'متعادل';

        foreach ($customerFinancials as $customerFinancial) {

            $balance += $customerFinancial->credit - $customerFinancial->debit;

            $totalCredit += $customerFinancial->credit;
            $totalDebit  += $customerFinancial->debit;

            // running balance per row
            $customerFinancial->CalculatedBalance = $balance;
        }

        // ✅ calculate status ONCE (final balance)
        if ($balance > 0) {
            $finalStatus = 'طلب';
        } elseif ($balance < 0) {
            $finalStatus = 'باقی';
        }

        // ✅ attach status only to last row
        if ($customerFinancials->isNotEmpty()) {
            $customerFinancials->last()->CalculatedStatus = $finalStatus;
        }

        return view('frontend.financial.show', compact(
            'customerFinancials',
            'customer_id',
            'totalCredit',
            'totalDebit'
        ));
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
