@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h2>All Rents</h2>

        @if ( !$rents->count() )
        <div class="alert alert-danger" role="alert">No rents available.</div>

        @else

        <a href="{{route('dashboard.rents.create')}}" class="btn btn-default">Add Rent</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Item Name</th>
                    <th>Customer Name</th>
                    <th>Rent Date</th>
                    <th>Expected Return Date</th>
                    <th>Paid Amount</th>
                    <th>Return</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rents as $rent)
                <tr>
                    <td>{{ $rent-> id }}</td>
                    <td>{{ $rent-> item ->name }}</td>
                    <td>{{ $rent-> customer ->customer_name }}</td>
                    <td>{{ $rent-> rent_date }}</td>
                    <td>{{ $rent-> rent_expect_date }}</td>
                    <td>{{ $rent-> paid_amount }}</td>
                    <td>
                        @if($rent-> rent_return == 0)
                        No
                        @else
                        Yes
                        @endif
                    </td>
                    <td>
                        <a href="{{route('dashboard.rents.edit', [$rent->id])}}" class="btn btn-success">Edit</a>&nbsp;&nbsp;
                        <a href="{{route('dashboard.rents.delete', [$rent->id])}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @endif
    </div>
</div>
@endsection