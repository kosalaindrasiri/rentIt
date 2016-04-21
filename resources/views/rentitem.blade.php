<form action="{{route('rents.add')}}" method="POST">
    {!! csrf_field() !!}
    <h2>You can rent an item here</h2>
    <label>Item</label><input type="text" name="item">
        <label>NIC</label><input type="text" name="nic">
    <label>Rent Date</label><input type="date" name="rentdate">
    <label>Paid Amount</label><input type="text" name="paidamnt">
    <button type="submit">Add Rent</button>
</form>
<h2>Rent list</h2>

    <?php
    foreach ($rentlist as $rentrecord){
    echo 'item id:&nbsp&nbsp'.($rentrecord->item_id).'</br>';
    echo 'nic:&nbsp&nbsp'.($rentrecord->nic).'</br>';
    echo 'paid:&nbsp&nbsp'.($rentrecord->paid).'</br>';
    echo 'rented date:&nbsp&nbsp'.($rentrecord->rent_date_and_time).'</br>';
    echo '</br>';
    }
?>