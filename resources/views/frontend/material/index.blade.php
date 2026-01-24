@extends('frontend.layout.master')
@section('content')

<div class="row">
    <div class="col-md-11 mx-auto">
        <h1 class="float-left">Material List:</h1>
        <a href="{{ route('Material.create') }}" class="btn btn-primary mb-1 float-right">Add Material</a>
        <table class="table table-bordered px-0 ">
            <thead>
                <tr>

                    <th>NO</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Model</th>
                    <th>Company</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materials as $index=>$material)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $material->name }}</td>
                    <td>{{ $material->type }}</td>
                    <td>{{ $material->model }}</td>
                    <td>{{ $material->company }}</td>
                    <td>{{ $material->price }}</td>
                    <td>{{ $material->amount }}</td>

                    <td>
                        <a href="{{ route('Material.show',['Material'=>$material->id]) }}" class="btn btn-primary">Detail</a>
                    </td>

                    {{-- <td>
                        <a href="{{ route('Material.edit',['Material'=>$material->id]) }}"><i class="fa fa-edit"></i></a>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection


@section('script')



@endsection

