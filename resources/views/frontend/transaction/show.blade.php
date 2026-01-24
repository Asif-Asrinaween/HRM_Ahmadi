@extends('frontend.layout.master')
@section('content')

<div class="row">
    <div class="col-md-11 mx-auto">
        <h1 class="float-left">Transaction History:</h1>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>CustomerID</th>
                    <th>Detail</th>
                    <th>Credite</th>
                    <th>Debit</th>
                    <th>Ballance</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->custId }}</td>
                    <td>{{ $transaction->detail }}</td>
                    <td>{{ $transaction->credite }}</td>
                    <td>{{ $transaction->debit }}</td>
                    <td>{{ $transaction->CalculatedBallance }}</td>
                    <td>{{ $transaction->CalculatedStatus }}</td>
                    <td>{{ $transaction->created_at }}</td>

                    <td>
                        <a href="{{ route('Transaction.show',['Transaction'=>$transaction->custId]) }}">Show more</a>

                    </td>
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




