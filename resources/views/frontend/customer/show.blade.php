@extends('frontend.layout.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Customer Details</h4>
                    <a href="{{ route('Customer.create') }}" class="btn btn-primary">
                        New Customer
                    </a>
                </div>

                @if (!$customer)
                    <div class="alert alert-warning">
                        Customer record not found.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-nowrap">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone NO</th>
                                    <th>Address</th>
                                    <th>Date Of Join</th>
                                    <th>Date Of Separate</th>
                                    <th>NID</th>
                                    <th>NID Photo</th>
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
                                    <td>
                                        @if ($customer->NidPhoto)
                                            <img src="{{ asset('uploads/' . $customer->NidPhoto) }}"
                                                alt="NID Photo" width="60" height="60"
                                                class="rounded">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $customer->level_text }}</td>
                                    <td>{{ $customer->CustRole }}</td>
                                    <td>
                                        <form class="d-inline"
                                            action="{{ route('Customer.destroy', ['Customer' => $customer->id]) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this record?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                        <a href="{{ route('Customer.edit', ['Customer' => $customer->id]) }}"
                                            class="btn btn-primary btn-sm ml-1" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif

                <a href="{{ route('Customer.index') }}" class="btn btn-secondary mt-3">
                    Back
                </a>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.delete').click(function() {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).attr('id');
                    var url = 'CustType/' + id;

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        url: url,
                        type: 'DELETE',
                        datatype: 'json',
                        data: {
                            "_method": 'DELETE'
                        },
                        success: function(data) {
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
