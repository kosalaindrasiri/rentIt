@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            
               @if ($errors->has())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }}<br>        
                @endforeach
            </div>
            @endif
            
            <h2>Add new Customer</h2>
            <form action="{{route('customers.add')}}" method="POST" enctype="multipart/form-data" >
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="usr">Customer Name:</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="usr">NIC:</label>
                    <input type="text" class="form-control" name="nic">
                </div>
                <div class="form-group">
                    <label for="usr">Phone:</label>
                    <input type="text" class="form-control" name="phone">
                </div>
                <div class="form-group">
                    <label for="usr">Address:</label>
                    <textarea class="form-control" rows="5" name="address"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Customer</button>
            </form>



        </div>
    </div>
</div>

@stop