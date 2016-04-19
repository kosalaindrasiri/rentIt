<form action="/rentitem" method="POST">
    {!! csrf_field() !!}
    <h2>You can rent an item here</h2>
    <label>Item</label><input type="text" name="item">
        <label>NIC</label><input type="text" name="nic">
    <label>Rent Date</label><input type="date" name="rentdate">
    <label>Paid Amount</label><input type="text" name="paidamnt">
    <button type="submit">Add Rent</button>
</form>