@extends('frontend.layout.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">

                <h4 class="mb-3">Customer Things</h4>
                <a href="#" class="btn btn-secondary mt-0 float-right mb-1"
                    onclick="window.history.back();">
                    Back
                </a>
                {{-- if no records found --}}
                @if ($things->isEmpty())
                    <div class="alert alert-warning">
                        No things found for this customer.
                    </div>
                @else
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Type</th>
                                <th>Model</th>
                                <th>Amount</th>
                                <th>Unit Price</th>
                                <th>Sum</th>
                                <th>Detail</th>
                                <th>Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($things as $index => $thing)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>{{ $thing->customer->Name }}</td>

                                    <td>
                                        {{ $thing->type == 1 ? 'Debit' : 'Credit' }}
                                    </td>

                                    <td>{{ $thing->model }}</td>

                                    <td>{{ $thing->amount }}</td>

                                    <td>{{ number_format($thing->unit_price, 2) }}</td>

                                    <td>
                                        {{ number_format($thing->sum, 2) }}
                                    </td>

                                    <td>{{ $thing->detail ?? '-' }}</td>

                                    <td>{{ $thing->date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif



            </div>
        </div>
    </div>
@endsection
