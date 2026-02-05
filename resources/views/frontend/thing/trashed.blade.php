@extends('frontend.layout.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url()->previous() }}" class="btn btn-secondary mb-2">
                    ← Back
                </a>

                <h4 class="mb-3">All Trashed Things</h4>
                @if ($things->isEmpty())
                    <div class="alert alert-warning">
                        No trashed things found.
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
                                {{-- Row color based on Credit / Debit --}}
                                <tr
                                    @if ($thing->type == 1) style="background-color: #fff2e6;" {{-- Debit --}}
                                @else
                                    style="background-color: #e6ffe6;" {{-- Credit --}} @endif>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $thing->customer->Name }}</td>
                                    <td>
                                        {{ $thing->type == 1 ? 'Debit' : 'Credit' }}
                                    </td>
                                    <td>{{ $thing->model }}</td>
                                    <td>{{ $thing->amount }}</td>
                                    <td>{{ number_format($thing->unit_price, 2) }}</td>
                                    <td>{{ number_format($thing->sum, 2) }}</td>
                                    <td>{{ $thing->detail ?? '-' }}</td>
                                    <td>{{ $thing->date }}</td>

                                    <td class="text-center">
                                        {{-- Restore --}}
                                        <form action="{{ route('things.restore', $thing->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-success btn-sm" title="Restore">
                                                <i class="bi bi-arrow-counterclockwise"></i>
                                            </button>
                                        </form>

                                        {{-- Force Delete --}}
                                        <form action="{{ route('things.delete', $thing->id) }}"
                                            method="POST" class="d-inline"
                                            onsubmit="return confirm('Permanently delete this record?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                title="Delete Permanently">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
@endsection
