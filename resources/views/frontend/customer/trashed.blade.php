@extends('frontend.layout.master')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Deleted Customers</h4>
                <a href="{{ route('Customer.index') }}" class="btn btn-secondary">
                    Back
                </a>
            </div>

            @if($customers->isEmpty())
                <div class="alert alert-warning">
                    No deleted customers found.
                </div>
            @else
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Deleted At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $index => $customer)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $customer->Name }}</td>
                                <td>{{ $customer->Phone }}</td>
                                <td>{{ $customer->deleted_at }}</td>
                                <td>
                                    <form action="{{ route('Customer.restore', $customer->id) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-success btn-sm">
                                            <i class="bi bi-arrow-counterclockwise"></i>
                                            
                                        </button>
                                    </form>

                                    <form action="{{ route('Cutomer.delete', $customer->id) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Permanently delete this customer?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
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
