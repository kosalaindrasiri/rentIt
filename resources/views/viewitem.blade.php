<p>Item Name : {{$item->name}}</p>
<p>Item Price: {{$item->price}}</p>
<img src="{{$item->image_url}}" width="100px"></img>
<form action="{{ url('items/updateview/'.$item->id) }}" method="get" >
        {!! csrf_field() !!} 
        <button type="submit">Update</button>
    </form>
 <form action="{{ url('items/'.$item->id) }}" method="POST" >
        {!! csrf_field() !!} {!! method_field('DELETE') !!}
        <button type="submit">Delete</button>
    </form>