@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h2>Add new Item</h2>
            <form action="{{route('items.add')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {!! csrf_field() !!}
                <div class="form-group"  style="background-color:{{ $errors->has('name') ? '#f2dede' : 'white' }}">
                    <label  class="col-sm-4 control-label">Item name* :</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control"  value="{{old('name')}}">
                    </div>
                </div>
                <div class="form-group"  style="background-color:{{ $errors->has('purchased_price') ? '#f2dede' : 'white' }}">
                    <label  class="col-sm-4 control-label">Purchased Price* :</label>
                    <div class="col-sm-8">
                        <input type="text" name="purchased_price" class="form-control"  value="{{old('purchased_price')}}">
                    </div>
                </div>

                <div class="form-group"  style="background-color:{{ $errors->has('rent_price') ? '#f2dede' : 'white' }}">
                    <label  class="col-sm-4 control-label">Rent Price per day* :</label>
                    <div class="col-sm-8">
                        <input type="text" name="rent_price" class="form-control"  value="{{old('rent_price')}}">
                    </div>
                </div>
                <div class="form-group" style="background-color:{{ $errors->has('code') ? '#f2dede' : 'white' }}">
                    <label  class="col-sm-4 control-label">Code :</label>
                    <div class="col-sm-8">
                        <input type="text" name="code" class="form-control"  value="{{old('code')}}">
                    </div>
                </div>


                <div class="form-group"> 
                    <label class="col-sm-4 control-label">Availability :</label> 
                    <div class="col-sm-8"> 
                        <label class="radio-inline"><input type="radio" name="availability" value="1" checked="checked">Yes</label> 
                        <label class="radio-inline"><input type="radio" name="availability" value="0">No</label> 
                    </div> 
                </div>

                <div class="form-group"> 
                    <label class="col-sm-4 control-label">Image :</label> 
                    <div class="col-sm-6"> 
                        <input type="file" name="image" class="form-control"> 
                    </div> 
                </div> 

                <div class="form-group"> 
                    <div class="col-sm-offset-4 col-sm-6"> 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <button type="submit" class="btn btn-primary">Add Item</button> 
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