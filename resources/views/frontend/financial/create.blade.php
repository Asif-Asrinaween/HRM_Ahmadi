@extends('frontend.layout.master')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                {{-- link back to customer list --}}
                <div class="d-flex justify-content-between float-right mb-3">
                        <a href="{{ route('Customer.index') }}" class="btn btn-secondary">
                            Back
                        </a>
                </div>

                <h4 class="mb-3">Add Financial Record</h4>
                <form action="{{ route('financials.store') }}" method="POST">
                    @csrf

                    {{-- Customer --}}
                    <div class="form-group mb-3">
                        <label for="customer_id">Customer</label>
                        <select name="customer_id" class="form-control" required>
                            <option value="">-- Select Customer --</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">
                                    {{ $customer->Name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Detail --}}
                    <div class="form-group mb-3">
                        <label for="detail">Detail</label>
                        <textarea name="detail" class="form-control" rows="1"></textarea>
                    </div>

                    {{-- Currency --}}
                    <div class="form-group mb-3">
                        <label for="currency">Currency</label>
                        <select name="currency" class="form-control" required>
                            <option value="">-- Select Currency --</option>
                            <option value="AFN">AFN</option>
                        </select>
                    </div>

                    {{-- Credit --}}
                    <div class="form-group mb-3">
                        <label for="credit">Credit</label>
                        <input type="number" step="0.01" name="credit" class="form-control">
                    </div>

                    {{-- Debit --}}
                    <div class="form-group mb-3">
                        <label for="debit">Debit</label>
                        <input type="number" step="0.01" name="debit" class="form-control">
                    </div>

                    {{-- Date --}}
                    <div class="form-group mb-3">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>

                    {{-- Buttons --}}
                    

                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
