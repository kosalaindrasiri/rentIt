@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h2>Add new Customer</h2>
            <form action="{{route('customers.add')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {!! csrf_field() !!}

                <div class="form-group"  style="background-color:{{ $errors->has('name') ? '#f2dede' : 'white' }}">
                    <label class="col-sm-4 control-label">Customer Name* :</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control"  value="{{ old('name') }}">
                    </div>
                </div>

                <div class="form-group"  style="background-color:{{ $errors->has('nic') ? '#f2dede' : 'white' }}">
                    <label  class="col-sm-4 control-label">NIC* :</label>
                    <div class="col-sm-8">
                        <input type="text" name="nic" class="form-control"  value="{{ old('nic') }}">
                    </div>
                </div>

                <div class="form-group"  style="background-color:{{ $errors->has('phone') ? '#f2dede' : 'white' }}">
                    <label  class="col-sm-4 control-label">Phone* :</label>
                    <div class="col-sm-8">
                        <input type="text" name="phone" class="form-control"  value="{{ old('phone') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-4 control-label">Address :</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="5" name="address">{{ old('address') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
                        <button type="submit" class="btn btn-primary">Add Customer</button>
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