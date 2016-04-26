@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table>
                <tr><td>
                        <label for="usr" >Customer Name :</label>
                    </td><td>
                        <label class="">{{$customers->customer_name}}</label>
                    </td></tr>
                <tr><td>
                        <label for="usr" >NIC :</label>
                    </td><td>
                        <label class="">{{$customers->nic}}</label>
                    </td></tr>
                <tr><td>
                        <label for="usr" >Phone :</label>
                    </td><td>
                        <label class="">{{$customers->phone}}</label>
                    </td></tr>
                <tr><td>
                        <label for="usr" >Address:</label>
                    </td><td>
                        <label class="">{{$customers->address}}</label>
                    </td></tr>
            </table>
            <form method="get" action="{{route('dashboard.customers.one.update',[$customers->id])}}"> 
                <button type="submit" class="btn btn-primary">Update Customer</button> 
            </form> 
            <form action="{{ url('customers/'.$customers->id) }}" method="POST" >
                {!! csrf_field() !!} {!! method_field('DELETE') !!}
                <button type="submit" class="btn btn-danger">Delete</button>
            </form> 
        </div>
    </div>
</div>

@stop