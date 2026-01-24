<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.transaction.index')
            ->with('transactions', Transaction::orderBy('created_at', 'DESC')->Paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return $id;
    //     return view('frontend.transaction.create');
    // }

    public function created($CustId)
    {
        return view('frontend.transaction.create')
            ->with('CustId', $CustId);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Transaction::create(['custId' => $request->custId, 'detail' => $request->detail, 'credite' => $request->credite, 'debit' => $request->debit,]);
        return redirect()->route('Customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($Transaction)
    {
        $transactions = Transaction::where('custId', $Transaction)->get();
        // Add balance calculation
        $ballance = 0;
        foreach ($transactions as $transaction) {
            $status = "تصفیه";
            $ballance = ($ballance + $transaction->credite) - ($transaction->debit);
            $transaction->CalculatedBallance = $ballance;
            
            //calculating the status
            if($ballance>0){
                $status="طلب";
                $transaction->CalculatedStatus = $status;
            }
            elseif($ballance<0){
                $status="باقی";
                $transaction->CalculatedStatus = $status; 
            }else{
                $transaction->CalculatedStatus = $status;
            }
        }
        return view('frontend.transaction.show')
            ->with('transactions', $transactions);
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
