@extends('frontend.layout.master')
@section('content')


<div class="table-responsive">
    <table class="table table-bordered text-nowrap">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone NO</th>
                <th>Add</th>
                <th>DateOfJoin</th>
                <th>DateOfSeparate</th>
                <th>NID</th>
                <th>NidPhoto</th> 
                <th>Level</th> 
                <th>Customer Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->Name }}</td>
                <td>{{ $customer->Phone }}</td>
                <td>{{ $customer->Add }}</td>
                <td>{{ $customer->DateOfJoin }}</td>
                <td>{{ $customer->DateOfSeparate }}</td>
                <td>{{ $customer->NID }}</td>
                <td>{{ $customer->NidPhoto }}</td>
                <td>{{ $customer->level_text }}</td>
                <td>{{ $customer->CustRole }}</td>
                <td>
                    <form class="float-left" action="{{ route('delete',['id' => $customer->id]) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to permanently delete this record?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                         <i class="bi bi-trash"></i></button>
                    </form>

                    <a href="{{ route('Customer.edit',['Customer'=>$customer->id]) }}"
                       class="btn btn-primary btn-sm ml-0"><i class="bi bi-pencil-square"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
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

