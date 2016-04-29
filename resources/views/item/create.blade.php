@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <form method="get" action="{{route('dashboard.rents.all')}}">
                <button type="submit">Rent an Item</button>
            </form>
            <h2>Add new Item</h2>
            <form action="{{route('items.add')}}" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <label>Item Name : </label><input type="text" name="name"></br>
    		<label>Purchased Price : </label><input type="text" name="purchased_price"></br>
    		<label>Rent Price Per Day : </label><input type="text" name="rent_price"></br>
    		<label>Code : </label><input type="text" name="code"></br>
    		<label>Availability : </label>
    		<input type="radio" name="availability" value="1" checked>yes
    		<input type="radio" name="availability" value="0">no</br>
                <label>Image</label> <input type="file" name="image" id="fileToUpload">
                <button type="submit">Add Item</button>
            </form>
            
        </div>
    </div>
</div>
@endsection
