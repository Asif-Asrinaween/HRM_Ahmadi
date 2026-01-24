@extends('frontend.layout.master')
@section('content')


<div class="row">
    <div class="col-md-6 mx-auto">
        <h3 class="float-left">Trash List:</h3>
        <a href="{{ route('CustType.index') }}" class="btn btn-success mb-2 float-right">Go back</a>
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
                        {{-- <a href="#" class="delete" id="{{ $item->id }}">Delete</a> --}}

                        <form action="{{ route('CustType.force-delete', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this record?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger float-left">Delete</button>
                        </form>

                        <a href="{{ route('CustType.restore',['id'=>$item->id]) }}" class="btn btn-success">restore</a>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection

{{--
//this ajax code for force delete but did not work i don't know what it need to run
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
                    var url = 'force-delete/'+id;




                    // $.ajaxsetup({
                    //     headers:{
                    //         'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    //     }
                    // });

                    $.ajax({
                        headers:{'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
                        // let token = $('meta[name="csrf-token"]').attr('content');

                        url:url,
                        type:'DELETE',
                        datatype:'json',
                        data:{"_method":'DELETE',},
                        success:function(data){
                            location.reload();
                        }
                });

                    // Swal.fire({
                    // title: "Deleted!",
                    // text: "Your file has been deleted.",
                    // icon: "success"
                    // });
                }
            });

            });

            </script>
            @endsection
            --}}
