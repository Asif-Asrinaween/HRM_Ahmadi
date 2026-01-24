@extends('frontend.layout.master')
@section('content')
    <form action="{{ route('CustType.update',['CustType'=>$item->id]) }}" method="POST" enctype="multipart/form-data">


        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h1>Edit Customer Type:</h1>
                <div class="form-group">
            <a href="{{ route('CustType.index') }}" class="btn btn-success mb-2 float-right">Go back</a>
            <label>CustType</label>
        <input type="text" name="CustType" value="{{ $item->CustType }}" class="form-control" required>
        @error('CustType')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="col-md-2 mt-2">
                <button class="btn btn-primary" type="submit">Update</button>
                </div>
        </div>
</div>
</div>
</form>

@endsection
