@extends('frontend.layout.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">

                <h4 class="mb-3">Customer Things Account</h4>
                <a href="{{ route('Customer.thing') }}" class="btn btn-secondary mt-0 float-right mb-1">
                    Back
                </a>

                <a href="{{ route('things.trashed') }}" class="btn btn-warning">
                    Recycle Bin
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
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($things as $index => $thing)
                                {{-- colorize the row based on type --}}
                                <tr
                                    @if ($thing->type == 1) style="background-color: #fff2e6;" 
                                    @elseif ($thing->type == 0)
                                        style="background-color: #e6ffe6;" @endif>
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


                                    <td class="text-center">

                                        <a href="{{ route('things.edit', ['thing' => $thing->id]) }}"
                                            class="btn btn-primary btn-sm ml-1" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form class="d-inline"
                                            action="{{ route('things.destroy', ['thing' => $thing->id]) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this record?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($things->isEmpty())
                        <div class="alert alert-warning">
                            No things found for this customer.
                        </div>
                    @else
                        <table class="table table-bordered table-striped">
                            <!-- table head and body -->
                        </table>

                        {{-- PAGINATION --}}
                        <div class="d-flex justify-content-center mt-3">
                            {{ $things->links() }}
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
