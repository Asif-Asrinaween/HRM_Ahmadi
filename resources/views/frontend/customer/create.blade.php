@extends('frontend.layout.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">Create Customer</h5>
            <div class="card-body">
                <a href="{{ route('Customer.index') }}" class="btn btn-primary mb-1 float-right">Back</a>
                {{-- Begin form --}}
                <form action="{{ route('Customer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="Name" class="form-control"
                            placeholder="enter customer name">
                        @error('Name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Phone">Phone</label>
                        <input type="tel" name="Phone" class="form-control"
                            placeholder="enter the phone number" pattern="[0-9]{10,12}" required>
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Add">Add</label>
                        <input type="text" name="Add" class="form-control"
                            placeholder="enter the address"required>
                        @error('Add')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="DateOfJoin">DateOfJoin</label>
                        <input type="text" name="DateOfJoin" class="form-control shamsiCalendar"
                            required>
                        @error('DateOfJoin')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="DateOfSeparate">DateOfSeparate</label>
                        <input type="text" name="DateOfSeparate" class="form-control shamsiCalendar"
                            value="{{ old('DateOfSeparate') }}">
                        @error('DateOfSeparate')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="NID">NID</label>
                        <input type="number" name="NID" class="form-control"
                            placeholder="enter the Nation ID" required>
                        @error('NID')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="NidPhoto">NidPhoto</label>
                        <input type="file" name="NidPhoto" class="form-control" accept="image/*">
                        @error('NidPhoto')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="Level">Level</label>
                        <select name="Level" class="form-select form-control" required>
                            <option value="">-- Select Status --</option>
                            <option value="1" {{ old('Level') == '1' ? 'selected' : '' }}>Upper
                                Hand</option>
                            <option value="0" {{ old('Level') == '0' ? 'selected' : '' }}>Under
                                Hand</option>
                        </select>
                        @error('Level')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="CustRole">Customer Role</label>
                        <input type="text" name="CustRole" class="form-control"
                            placeholder="enter customer role" required>
                        @error('CustRole')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    <button class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>

    </div>

    </div>
    <!-- End of Main Content -->
@endsection

{{-- shamsi calendar script  --}}
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
