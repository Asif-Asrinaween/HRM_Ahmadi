@extends('frontend.layout.master')
@section('content')


{{-- began CustType form --}}

<form action="{{ route('CustType.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="col-md-6 mx-auto">
        <h2>Create Customer Type</h2>
    <div class="form-group">
        <label>Type</label>
    <input type="text" name="CustType" placeholder="Enter your Customer Type" class="form-control" required>
    @error('CustType')
        <p class="text-danger">{{ $message }}</p>
    @enderror

            <div class="col-md-2 mt-2">
            <button class="btn btn-primary" type="submit">Save</button>
            </div>
    </div>
</div>
</div>
</form>

{{-- End Form --}}


{{-- begin Customer type list --}}


<div class="row">
    <div class="col-md-6 mx-auto">
        <a href="{{ route('CustType.trash') }}" class="btn btn-success mb-2 float-right">Trash</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CustType</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->CustType }}</td>

                    <td>
                        {{-- delete via ajax --}}
                        <a href="#" class="delete" id="{{ $item->id }}"><i class="fa fa-trash"></i></a>
                        <a href="{{ route('CustType.edit',['CustType'=>$item->id]) }}"><i class="fa fa-edit"></i></a>
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
