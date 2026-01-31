@extends('frontend.layout.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Customer List for Thing</h4>
                </div>
                {{-- if no records found --}}
                @if ($customers->isEmpty())
                    <div class="alert alert-warning">
                        No customers found.
                    </div>
                @else
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Customer Level</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($customers as $index => $customer)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <a href="{{ route('things.show', $customer->id) }}">
                                            {{ $customer->Name }}
                                        </a>
                                    </td>
                                    <td>{{ $customer->level_text }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
@endsection
