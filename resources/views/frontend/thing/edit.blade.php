@extends('frontend.layout.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">



                <h4 class="mb-3">Edit this thing record</h4>
                {{-- Back button --}}
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('things.show', ['thing' => $thing->customer_id]) }}"
                        class="btn btn-outline-secondary mb-2 float-right">Back</a>
                </div>
                <form action="{{ route('things.update', $thing->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Customer --}}
                    <div class="form-group mb-3">
                        <label for="customer_id">Customer</label>
                        <input type="text" class="form-control" value="{{ $thing->customer->Name }}"
                            readonly>
                        <input type="hidden" name="customer_id" value="{{ $thing->customer_id }}">

                    </div>

                    {{-- Type --}}
                    <div class="form-group mb-3">
                        <label for="type">Type</label>
                        <select name="type" class="form-control" required>
                            <option value="">-- Select Type --</option>
                            <option value="0" {{ $thing->type == 0 ? 'selected' : '' }}>
                                Credit
                            </option>
                            <option value="1" {{ $thing->type == 1 ? 'selected' : '' }}>
                                Debit
                            </option>
                        </select>
                    </div>

                    {{-- Model --}}
                    <div class="form-group mb-3">
                        <label for="model">Model</label>
                        <input type="text" name="model" class="form-control"
                            value="{{ old('model', $thing->model) }}" required>
                    </div>

                    {{-- Amount --}}
                    <div class="form-group mb-3">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" class="form-control" min="1"
                            value="{{ old('amount', $thing->amount) }}" required>
                    </div>

                    {{-- Unit Price --}}
                    <div class="form-group mb-3">
                        <label for="unit_price">Unit Price</label>
                        <input type="number" step="0.01" name="unit_price" class="form-control"
                            value="{{ old('unit_price', $thing->unit_price) }}" required>
                    </div>

                    {{-- Model Image --}}
                    <div class="form-group">
                        <label for="model_image">Model Image</label>
                        <input type="file" name="model_image" class="form-control" accept="image/*">
                        @error('model_image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Detail --}}
                    <div class="form-group mb-3">
                        <label for="detail">Detail</label>
                        <textarea name="detail" class="form-control" rows="1" placeholder="Optional details">{{ old('detail', $thing->detail) }}</textarea>
                    </div>

                    {{-- Date --}}
                    <div class="form-group mb-3">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control"
                            value="{{ old('date', $thing->date) }}" required>
                    </div>

                    {{-- Buttons --}}
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>

                    {{-- <a href="{{ route('things.show') }}" class="btn btn-outline-secondary ms-2">
                    Cancel
                </a> --}}

                </form>

            </div>
        </div>
    </div>
@endsection
