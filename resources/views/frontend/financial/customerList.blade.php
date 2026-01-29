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
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>
                                <a href="{{ route('financials.show', $customer->id) }}">
                                    {{ $customer->Name }}</a>

                            </td>
                            <td>{{ $customer->level_text }}</td>


                            {{--
                    <td>
                        <a href="{{ route('delete',['id'=>$item->id]) }}"><i class="fa fa-trash"></i></a>
                        <a href="{{ route('Admin.edit',['Admin'=>$item->id]) }}"><i class="fa fa-edit"></i></a>
                    </td> --}}
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
