@extends('frontend.layout.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card">
            <h5 class="card-header">Update Customer</h5>
            <div class="card-body">
                <a href="{{ route('Customer.show', ['Customer' => $customer->id]) }}"
                    class="btn btn-primary mb-2 float-right">Back</a>
                {{-- Begin form --}}
                <form action="{{ route('Customer.update', ['Customer' => $customer->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="Name" class="form-control"
                            value="{{ $customer->Name }}">
                        @error('Name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                            <label for="Phone">Phone</label>
                            <input type="tel" name="Phone" class="form-control"
                                value="{{ $customer->Phone }}" pattern="[0-9]{10,12}" required>
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Add">Add</label>
                            <input type="text" name="Add" class="form-control"
                                value="{{ $customer->Add }}">
                            @error('Add')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="DateOfJoin">DateOfJoin</label>
                            <input type="date" name="DateOfJoin" class="form-control"
                                value="{{ $customer->DateOfJoin }}">
                            @error('DateOfJoin')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="DateOfSeparate">DateOfSeparate</label>
                            <input type="date" name="DateOfSeparate" class="form-control"
                                value="{{ $customer->DateOfSeparate }}">
                            @error('DateOfSeparate')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="NID">NID</label>
                            <input type="number" name="NID" class="form-control"
                                value="{{ $customer->NID }}">
                            @error('NID')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="NidPhoto">NidPhoto</label>
                            <input type="file" name="NidPhoto" value="link" class="form-control"
                                accept="image/*">
                            @error('NidPhoto')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Level">Level</label>
                            <select
                                name="Level"value=" @if ($customer->Level == '1') Upper Hand
                                    @elseif ($customer->Level == '2')
                                        Under Hand @endif "
                                class="form-select form-control">

                                <option value="1" {{ $customer->Level == '1' ? 'selected' : '' }}>
                                    Upper Hand</option>
                                <option value="2" {{ $customer->Level == '2' ? 'selected' : '' }}>
                                    Under Hand</option>
                            </select>

                            @error('Level')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="CustRole">Customer Role</label>
                            <input type="text" name="CustRole"
                                value="{{ $customer->CustRole }}"class="form-control">
                            @error('CustRole')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        <button class="btn btn-primary">Update</button>
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
