@extends('frontend.layout.master')
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">Create Transaction</h5>
            <div class="card-body">
            <a href="{{ route('Customer.index') }}" class="btn btn-primary mb-1 float-right">Back</a>
            {{-- Begin form --}}
    <form action="{{ route('Transaction.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="custId">Customer ID</label>
            <input type="number" name="custId" class="form-control" value="{{ $CustId }}" readonly>
            @error('custId')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

            <div class="form-group">
                <label for="detail">Detail</label>
                <textarea name="detail" cols="60" rows="1" class="form-control"></textarea>
                @error('detail')
                <p class="text-danger">{{ $message }}</p>
                @enderror
        </div>

        <div class="form-group">
            <label for="credite">Credite</label>
            <input type="number" name="credite" class="form-control" placeholder="enter credite amount">
            @error('credite')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        <div class="form-group">
            <label for="debit">Debit</label>
            <input type="number" name="debit" class="form-control" placeholder="enter debit amount">
            @error('debit')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        {{-- <div class="form-group">
            <label for="CustType">Customer Type</label>
            <select name="CustType" class="form-select form-control" aria-label="Default select example">
                <option selected>--CustType--</option>
                @foreach ($custTypes as $custType )
                <option value="{{ $custType->CustType }}">{{ $custType->CustType }}</option>
                @endforeach
            </select>
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
