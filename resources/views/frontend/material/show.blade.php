@extends('frontend.layout.master')
@section('content')

<div class="row">
    <div class="col-md-11 mx-auto">
        <h3>Material Info:</h3>
        <a href="{{ route('Material.index') }}" class="btn btn-primary mb-2 float-left">Back</a>
        {{-- <a href="{{ route('Customer.trash') }}" class="btn btn-success mb-2 float-right">Trash</a> --}}
        <table class="table table-bordered">
            <thead>
                <tr>

                    <th>Name</th>
                    <th>Type</th>
                    <th>Model</th>
                    <th>Company</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>{{ $material->name }}</td>
                    <td>{{ $material->type }}</td>
                    <td>{{ $material->model }}</td>
                    <td>{{ $material->company }}</td>
                    <td>{{ $material->price }}</td>
                    <td>{{ $material->amount }}</td>
                    <td>{{ $material->created_at }}</td>
                    <td>
                        {{-- delete via ajax --}}
                        {{-- <a href="#" class="delete" id="{{ $customer->id }}"><i class="fa fa-trash"></i></a> --}}

                        <form class="float-left" action="{{ route('delete',['id' => $material->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this record?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                        <a href="{{ route('Material.edit',['Material'=>$material->id]) }}" class="btn btn-primary ml-1 ">Edit</a>

                    </td>
{{--
                    <td>
                        <a href="{{ route('delete',['id'=>$item->id]) }}"><i class="fa fa-trash"></i></a>
                        <a href="{{ route('Admin.edit',['Admin'=>$item->id]) }}"><i class="fa fa-edit"></i></a>
                    </td> --}}
                </tr>
            </tbody>

        </table>
    </div>
</div>

@endsection


@section('script')

<script>
    $('.delete').click(function(){


    Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yas,delete it!"
    }).then((result) => {
    if (result.isConfirmed) {

        var id = $(this).attr('id');
        var url = 'CustType/'+id;

        // $.ajaxsetup({
        //     headers:{
        //         'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $.ajax({
            headers:{'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
            url:url,
            type:'DELETE',
            datatype:'json',
            data:{"_method":'DELETE',},
            success:function(data){
                location.reload();
            }
    });

        Swal.fire({
        title: "Deleted!",
        text: "Your file has been deleted.",
        icon: "success"
        });
    }
});

});

</script>
@endsection

