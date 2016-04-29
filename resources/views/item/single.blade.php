@extends('layouts.app')
@section('content')
<p>Item Name : {{$item->name}}</p>
<p>Purchased Price: {{$item->purchased_price}}</p>
<p>Rent Price: {{$item->rent_price}}</p>
<p>Item Code: {{$item->code}}</p>
<?php
if ($item->image_url) {
    ?>
    <img src="{{$item->image_url}}" width="100px"></img>
<?php } ?>
<form action="{{ url('dashboard/items/'.$item->id).'/update' }}" method="get" >
    {!! csrf_field() !!} 
    <button type="submit">Update</button>
</form>

<form action="{{ url('items/'.$item->id) }}" method="POST" >
    {!! csrf_field() !!} {!! method_field('DELETE') !!}
    <button type="submit">Delete</button>
</form>
@stop