@extends('main_structure')
@section('content')
<form action="{{ url('items/'.$item->id) }}" method="POST" >
    {!! csrf_field() !!}{!! method_field('PUT') !!}
    <label>Item Name</label><input type="text" name="name" value="{{$item->name}}">
    <label>Price</label><input type="text" name="price" value="{{$item->price}}">
    <button type="submit">Update Item</button>
</form>
@stop