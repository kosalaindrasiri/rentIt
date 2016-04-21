<form action="{{ url('items/'.$item->id) }}" method="POST" >
    {!! csrf_field() !!}
    <label>Item Name</label><input type="text" name="name" value="{{$item->name}}">
    <label>Price</label><input type="text" name="price" value="{{$item->price}}">
    <button type="submit">Update Item</button>
</form>