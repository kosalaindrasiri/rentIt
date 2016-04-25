@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
                     
            <form action="{{ url('customers/'.$customers->id) }}" method="POST" >
                {!! csrf_field() !!}{!! method_field('PUT') !!}
              
             <div class="form-group">
                    <label for="usr">Customer Name:</label>
                    <input type="text" class="form-control" name="name" value="{{$customers->customer_name}}">
                </div>
                <div class="form-group">
                    <label for="usr">NIC:</label>
                    <input type="text" class="form-control" name="nic" value="{{$customers->nic}}">
                </div>
                <div class="form-group">
                    <label for="usr">Phone:</label>
                    <input type="text" class="form-control" name="phone" value="{{$customers->phone}}">
                </div>
                <div class="form-group">
                    <label for="usr">Address:</label>
                    <textarea class="form-control" rows="5" name="address">{{$customers->address}}</textarea>
                </div>
 <button type="submit" class="btn btn-primary">Update Customer</button>    
                

            </form>
        </div>
    </div>
</div>
@stop