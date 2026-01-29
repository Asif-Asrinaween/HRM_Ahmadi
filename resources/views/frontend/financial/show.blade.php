@extends('frontend.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-11 mx-auto">
            <h1 class="float-left">Financial History of this person</h1>
            <a href="{{ route('financial.singleCreate', $customer_id) }}"
                class="btn btn-primary mb-1 float-right">New Record</a>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Detail</th>
                        <th>Currency</th>
                        <th>Credit</th>
                        <th>Debit</th>
                        <th>Balance</th>
                        <th>Status</th>
                        <th>Date</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customerFinancials as $customerFinancial)
                        <tr>
                            <td>{{ $customerFinancial->customer_id }}</td>
                            <td>{{ $customerFinancial->detail }}</td>
                            <td>{{ $customerFinancial->currency }}</td>
                            <td>{{ $customerFinancial->credit }}</td>
                            <td>{{ $customerFinancial->debit }}</td>
                            <td>{{ $customerFinancial->CalculatedBalance }}</td>
                            <td>{{ $customerFinancial->CalculatedStatus }}</td>
                            <td>{{ $customerFinancial->date }}</td>

                            {{-- <td>
                        <a href="{{ route('Transaction.show',['Transaction'=>$transaction->custId]) }}">Show more</a>

                    </td> --}}
                            {{--
                    <td>
                        <a href="{{ route('delete',['id'=>$item->id]) }}"><i class="fa fa-trash"></i></a>
                        <a href="{{ route('Admin.edit',['Admin'=>$item->id]) }}"><i class="fa fa-edit"></i></a>
                    </td> --}}
                        </tr>
                    @endforeach
                </tbody>
                <tr>
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    <td>{{ $customerFinancial->totalCredit }}</td>
                    <td>{{ $customerFinancial->totalDebit }}</td>
                </tr>

            </table>
            {{-- Buttons --}}
            <div class="d-flex justify-content-between">
                <a href="{{ route('Customer.financial') }}" class="btn btn-secondary">
                    Back
                </a>
            </div>
        </div>
    </div>
@endsection
