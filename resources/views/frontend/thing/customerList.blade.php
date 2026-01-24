@extends('frontend.layout.master')
@section('content')

<div class="row">
    <div class="col-md-4 mx-auto">
        <h1 class="float-left">Customer List:</h1>
        {{-- <a href="{{ route('Customer.create') }}" class="btn btn-primary mb-1 float-right">New Customer</a> --}}
        <table class="table table-bordered px-0 ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Customer Level</th>
                     <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>
                    <a href="{{ route('Customer.create') }}">{{ $customer->Name }} </a>
                    </td>
                    <td>{{ $customer->Level }}</td>


                    
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection


@section('script')



@endsection

