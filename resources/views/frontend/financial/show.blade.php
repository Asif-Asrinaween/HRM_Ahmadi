@extends('frontend.layout.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Financial History</h4>
                    <a href="{{ route('financial.singleCreate', $customer_id) }}" class="btn btn-primary">
                        New Record
                    </a>
                </div>
                {{-- if no records found --}}
                @if ($customerFinancials->isEmpty())
                    <div class="alert alert-warning">
                        No financial records found for this customer.
                    </div>
                @else
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Detail</th>
                                <th>Currency</th>
                                <th>Credit</th>
                                <th>Debit</th>
                                <th>Balance</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($customerFinancials as $index => $customerFinancial)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $customerFinancial->customer->Name }}</td>
                                    <td>{{ $customerFinancial->detail }}</td>
                                    <td>{{ $customerFinancial->currency }}</td>
                                    <td>{{ number_format($customerFinancial->credit, 2) }}</td>
                                    <td>{{ number_format($customerFinancial->debit, 2) }}</td>
                                    <td>{{ number_format($customerFinancial->CalculatedBalance, 2) }}
                                    </td>
                                    <td>{{ $customerFinancial->CalculatedStatus }}</td>
                                    <td>{{ $customerFinancial->date }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                        {{-- Total row --}}
                        <tfoot>
                            <tr class="fw-bold">
                                <td colspan="4">Total</td>
                                <td>{{ number_format($customerFinancial->totalCredit, 2) }}</td>
                                <td>{{ number_format($customerFinancial->totalDebit, 2) }}</td>
                                <td colspan="3"></td>
                            </tr>
                        </tfoot>

                    </table>
                @endif

                <a href="{{ route('Customer.financial') }}" class="btn btn-secondary mt-3">
                    Back
                </a>

            </div>
        </div>
    </div>
@endsection
