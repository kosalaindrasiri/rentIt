
<form method="get" action="/rentitem">
    <button type="submit">Rent an Item</button>
</form>
<h2>Add new Item</h2>
<form action="/additem" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <label>Item Name</label><input type="text" name="name">
    <label>Price</label><input type="text" name="price">
    <label>Image</label> <input type="file" name="image" id="fileToUpload">
    <button type="submit">Add Item</button>
</form>
<h2>Available Items</h2>
<?php
foreach ($items as $item){
    echo ($item->id).'</br>';
    echo ($item->name).'</br>';
    echo ($item->price).'</br>';
   if ($item->image_url){?>
        <img width="100px" src="{{$item->image_url}}"></img>
    <?php }?>

    
       <form action="{{ url('viewitem/'.$item->id) }}" method="get" >
        {!! csrf_field() !!} 
        <button type="submit">View</button>
    </form>
   <?php  echo '</br>';
}

?>