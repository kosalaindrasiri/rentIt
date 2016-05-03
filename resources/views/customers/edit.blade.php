@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">

            <h2>Update Customer</h2>
            <form action="{{ url('customers/'.$customers->id) }}" method="POST" class="form-horizontal">
                {!! csrf_field() !!}{!! method_field('PUT') !!}

                <div class="form-group"  style="background-color:{{ $errors->has('name') ? '#f2dede' : 'white' }}">
                    <label  class="col-sm-4 control-label">Customer Name* :</label>
                    <div class="col-sm-8" >
                        <input type="text" class="form-control " name="name" value="{{ $errors->has() ? old('name'): $customers->customer_name  }}">
                    </div>
                </div>

                <div class="form-group"  style="background-color:{{ $errors->has('nic') ? '#f2dede' : 'white' }}">
                    <label  class="col-sm-4 control-label">NIC* :</label>
                    <div class="col-sm-8" >
                        <input type="text" class="form-control " name="nic" value="{{ $errors->has() ? old('nic'): $customers->nic  }}">
                    </div>
                </div>

                <div class="form-group"  style="background-color:{{ $errors->has('phone') ? '#f2dede' : 'white' }}">
                    <label  class="col-sm-4 control-label">Phone* :</label>
                    <div class="col-sm-8" >
                        <input type="text" class="form-control " name="phone" value="{{ $errors->has() ? old('phone'): $customers->phone}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Address:</label>
                    <div class="col-sm-8" >
                        <textarea class="form-control" rows="5" name="address">{{ $errors->has() ? old('address'): $customers->address  }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-lg-offset-4" >
                        <button type="submit" class="btn btn-primary">Update Customer</button>
                    </div>
                </div>
            </form>
            
            @if ($errors->has())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }}<br>        
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>

@stop