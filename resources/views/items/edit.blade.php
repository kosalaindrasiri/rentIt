@extends('layouts.app')
@section('content')
<div class="container"> 
    <div class="row"> 
        <div class="col-lg-6"> 
            <h2>Update Item</h2> 
            <form action="{{ url('items/'.$item->id) }}" method="POST" enctype="multipart/form-data" > 
                {!! csrf_field() !!}{!! method_field('PUT') !!} 


                <div class="form-group col-lg-12" style="background-color:{{ $errors->has('name') ? '#f2dede' : 'white' }}"> 
                    <label class="col-sm-4 control-label">Item Name :</label> 
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control " name="name" value="{{ $errors->has() ? old('name'): $item->name  }}"> 
                    </div> 
                </div> 

                <div class="form-group col-lg-12" style="background-color:{{ $errors->has('purchased_price') ? '#f2dede' : 'white' }}"> 
                    <label class="col-sm-4 control-label">Purchased price :</label> 
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" name="purchased_price" value="{{ $errors->has() ? old('purchased_price'): $item->purchased_price}}"> 
                    </div> 
                </div> 

                <div class="form-group col-lg-12"   style="background-color:{{ $errors->has('rent_price') ? '#f2dede' : 'white' }}"> 
                    <label class="col-sm-4 control-label">Rent Price :</label> 
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" name="rent_price" value="{{ $errors->has() ? old('rent_price'): $item->rent_price}}"> 
                    </div> 
                </div> 

                <div class="form-group col-lg-12" style="background-color:{{ $errors->has('code') ? '#f2dede' : 'white' }}"> 
                    <label class="col-sm-4 control-label">Code :</label> 
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" name="code" value="{{ $errors->has() ? old('code'): $item->code}}"> 
                    </div> 
                </div> 

                <div class="form-group col-lg-12"> 
                    <label class="col-sm-4 control-label">Availability :</label> 
                    <div class="col-sm-8"> 
                        <label class="radio-inline"><input type="radio" name="availability" value="1" {{$item->availability==1 ?"checked":""}}>Yes</label> 
                        <label class="radio-inline"><input type="radio" name="availability" value="0" {{$item->availability== 0?"checked":""}}>No</label> 
                    </div> 
                </div> 

                <div class="form-group col-lg-12"> 
                    <label class="col-sm-4 control-label">Image :</label> 
                    <div class="col-sm-8"> 
                        <?php
                        if ($item->image_url) {
                            ?> 
                            <img src="{{$item->image_url}}" width="100px"> 
                        <?php } ?> 
                        <input type="file" name="image" class="form-control"> 
                    </div> 
                </div> 
                <button type="submit" class="btn btn-primary">Update Customer</button> 
            </form> 
            <br> 
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