@extends('layouts.app')
@section('content')
<form action="{{ url('items/'.$item->id) }}" method="POST" >
    {!! csrf_field() !!}{!! method_field('PUT') !!}
    <label>Item Name</label><input type="text" name="name" value="{{$item->name}}">
    <label>Rent Price</label><input type="text" name="rent_price" value="{{$item->rent_price}}">
    <label>Purchased Price</label><input type="text" name="purchased_price" value="{{$item->purchased_price}}">
    <label>Item Code</label><input type="text" name="code" value="{{$item->code}}">
    <button type="submit">Update Item</button>
</form>
@stop