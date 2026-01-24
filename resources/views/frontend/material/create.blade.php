@extends('frontend.layout.master')
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">Add Materials</h5>
            <div class="card-body">
            {{-- <a href="{{ route('Customer.index') }}" class="btn btn-primary mb-1 float-right">Back</a> --}}
            {{-- Begin form --}}
    <form action="{{ route('Material.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="enter product name">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" name="type" class="form-control" placeholder="enter type">
                @error('type')
                <p class="text-danger">{{ $message }}</p>
                @enderror
        </div>

        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" class="form-control" placeholder="enter the model" required>
            @error('model')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="company">Company</label>
            <input type="text" name="company" class="form-control" placeholder="enter the company" required>
            @error('company')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" placeholder="enter the price" required>
            @error('price')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" placeholder="enter the email">
            @error('amount')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        {{-- <div class="form-group">
            <label for="CustType">Customer Type</label>
            <input type="text" name="CustType" class="form-control">
            @error('CustType')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div> --}}


        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
        <button class="btn btn-primary">Save</button>
    </form>
    </div>
    </div>

</div>

</div>
<!-- End of Main Content -->




@endsection


{{-- @section('script')
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script>
    $('#lfm').filemanager('image');
</script>

@endsection --}}
