@extends('frontend.layout.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                {{-- link back to customer list --}}
                <div class="d-flex justify-content-between float-right mb-3">
                    <a href="{{ route('Customer.thing') }}" class="btn btn-secondary">
                        Back
                    </a>
                </div>
                <h4 class="mb-3">Add New Thing</h4>

                <form action="{{ route('things.store') }}" method="POST" enctype="multipart/form-data">
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

                    {{-- Type (Boolean) --}}
                    <div class="form-group mb-3">
                        <label for="type">Type</label>
                        <select name="type" class="form-control" required>
                            <option value="">-- Select Type --</option>
                            <option value="0">Credit</option>
                            <option value="1">Debit</option>
                        </select>
                    </div>


                    {{-- Model --}}
                    <div class="form-group mb-3">
                        <label for="model">Model</label>
                        <input type="text" name="model" class="form-control"
                            placeholder="Model name" required>
                    </div>

                    {{-- Amount --}}
                    <div class="form-group mb-3">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" class="form-control" min="1"
                            required>
                    </div>

                    {{-- Unit Price --}}
                    <div class="form-group mb-3">
                        <label for="unit_price">Unit Price</label>
                        <input type="number" step="0.01" name="unit_price" class="form-control"
                            required>
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
                        <textarea name="detail" class="form-control" rows="1" placeholder="Optional details"></textarea>
                    </div>

                    {{-- Date --}}
                    <div class="form-group mb-3">
                        <label for="date">Date</label>
                        <input type="text" name="date" class="form-control shamsiCalendar"
                            required>
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

@section('script')
    <script>
        $(document).ready(function() {
            $(".shamsiCalendar").persianDatepicker({
                formatDate: "YYYY/MM/DD"
            });
        });
    </script>
@endsection



{{-- @section('script')
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script>
    $('#lfm').filemanager('image');
</script>

@endsection --}}
