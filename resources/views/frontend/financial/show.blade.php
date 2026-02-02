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

                                    <td>{{ $customerFinancial->detail ?? '-' }}</td>

                                    <td>{{ $customerFinancial->currency }}</td>

                                    <td class="text-success fw-bold">
                                        {{ number_format($customerFinancial->credit, 2) }}
                                    </td>

                                    <td class="text-danger fw-bold">
                                        {{ number_format($customerFinancial->debit, 2) }}
                                    </td>

                                    <td class="fw-bold">
                                        {{ number_format($customerFinancial->CalculatedBalance, 2) }}
                                    </td>

                                    <td>
                                        @if ($loop->last)
                                            @if ($customerFinancial->CalculatedStatus === 'طلب')
                                                <span class="badge px-3 py-2"
                                                    style="background-color:#ccffcc;font-weight:bold;">
                                                    طلب
                                                </span>
                                            @elseif ($customerFinancial->CalculatedStatus === 'باقی')
                                                <span class="badge px-3 py-2"
                                                    style="background-color:#ffb380;font-weight:bold;">
                                                    باقی
                                                </span>
                                            @else
                                                <span class="badge px-3 py-2"
                                                    style="background-color:#ffd9b3;font-weight:bold;">
                                                    متعادل
                                                </span>
                                            @endif
                                        @endif
                                    </td>

                                    <td>{{ $customerFinancial->date }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                        {{-- TOTAL ROW --}}
                        <tfoot>
                            <tr class="table-secondary fw-bold">
                                <td colspan="4">Total</td>
                                <td>{{ number_format($totalCredit, 2) }}</td>
                                <td>{{ number_format($totalDebit, 2) }}</td>
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
