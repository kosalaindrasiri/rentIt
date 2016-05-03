@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <h2>Add Return</h2>
            <div class="form-group">
                <label for="selectCustomer" class="col-sm-2 control-label">Customer:</label>
                <div class="col-sm-4">
                    <select name="customer_name" class="form-control" id="selectCustomer">
                        <option disabled selected value>-- Select --</option>
                        @foreach($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
        </div>
    </div>
</div>

@stop