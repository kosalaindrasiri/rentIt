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
            <h2>Available Items</h2>
            <?php
            foreach ($items as $item) {
                echo ($item->id).'</br>';
    		echo ($item->name).'</br>';
    		echo ($item->purchased_price).'</br>';
    		echo ($item->rent_price).'</br>';
    		echo ($item->code).'</br>';
                if ($item->image_url) {
                    ?>
                    <img width="100px" src="{{$item->image_url}}"></img>
    <?php } ?>
                <form action="{{ route('dashboard.items.one', [$item -> id]) }}" method="get" >
                    {!! csrf_field() !!} 
                    <button type="submit">View</button>
                </form>
                <?php
                echo '</br>';
            }
            ?>
        </div>
    </div>
</div>
@endsection
