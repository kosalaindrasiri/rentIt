@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>{{$item->name}}</h2>
            <table>
                <tr><td>Purchased Price : </td><td><?php echo number_format($item->purchased_price, 2) ?></td></tr>
                <tr><td>Rent Price : </td><td><?php echo number_format($item->rent_price, 2) ?></td></tr>
                <tr><td>Code : </td><td>{{$item->code}}</td></tr>
                <tr><td>Availbility : </td><td>{{$item->availability=="1"?"Yes":"No"}}</td></tr>
                <?php if ($item->image_url) { ?>
                    <tr><td>Image</td><td> <img src="{{$item->image_url}}" width="100px"></td></tr>
                <?php } ?>
            </table>

            <form action="{{ url('dashboard/items/'.$item->id).'/update' }}" method="get" >
                {!! csrf_field() !!} 
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

            <form action="{{ url('items/'.$item->id) }}" method="POST" >
                {!! csrf_field() !!} {!! method_field('DELETE') !!}
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@stop