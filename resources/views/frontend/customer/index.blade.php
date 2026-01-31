@extends('frontend.layout.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Customer List</h4>
                    <a href="{{ route('Customer.create') }}" class="btn btn-primary">
                        Add Customer
                    </a>
                </div>
                {{-- if no records found --}}
                @if ($customers->isEmpty())
                    <div class="alert alert-warning">
                        No customers found.
                    </div>
                @else
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Level</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($customers as $index => $customer)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $customer->Name }}</td>
                                    <td>{{ $customer->level_text }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('Customer.show', ['Customer' => $customer->id]) }}"
                                            class="btn btn-sm btn-primary">
                                            Detail
                                        </a>
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
