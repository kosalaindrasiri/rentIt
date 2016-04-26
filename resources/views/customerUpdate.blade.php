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
            <form action="{{ url('customers/'.$customers->id) }}" method="POST" >
                {!! csrf_field() !!}{!! method_field('PUT') !!}
                <div class="form-group" style="background-color:{{ $errors->has('name') ? '#f2dede' : 'white' }}">
                    <label for="usr" >Customer Name* :</label>
                    <input type="text" class="form-control " name="name" value=" {{ $errors->has('name') ? old('name'): $customers->customer_name  }}">
                </div>
                <div class="form-group" style="background-color:{{ $errors->has('nic') ? '#f2dede' : 'white' }}">
                    <label for="usr">NIC* :</label>
                    <input type="text" class="form-control" name="nic" value="{{ $errors->has('nic') ? old('nic'): $customers->nic  }}">
                </div>
                <div class="form-group" style="background-color:{{ $errors->has('phone') ? '#f2dede' : 'white' }}">
                    <label for="usr">Phone* :</label>
                    <input type="text" class="form-control" name="phone" value="{{ $errors->has('phone') ? old('phone'): $customers->phone  }}">
                </div>
                <div class="form-group">
                    <label for="usr">Address:</label>
                    <textarea class="form-control" rows="5" name="address">{{ $errors->has() ? old('address'): $customers->address  }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Customer</button>
            </form>
        </div>
    </div>
</div>

@stop