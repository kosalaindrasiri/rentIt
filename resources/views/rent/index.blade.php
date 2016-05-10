@extends('layouts.app')
@section('content')

<?php
$return_all = '';
$return_no = '';
$return_yes = '';
$item_name = '';
$keyword = '';
$paid_yes='';
$paid_no='';
$paid_all='';

if (isset($_GET['return'])) {
    $return_status = $_GET['return'];
    if ($return_status == 'yes') {
        $return_yes = 'selected';
    } elseif ($return_status == 'no') {
        $return_no = 'selected';
    }else {
    $return_all = 'selected';
}
} else {
    $return_all = 'selected';
}
if (isset($_GET['completely_paid'])) {
    $paid_status = $_GET['completely_paid'];
    if ($paid_status == 'yes') {
        $paid_yes = 'selected';
    } elseif ($paid_status == 'no') {
        $paid_no = 'selected';
    }else {
    $paid_all = 'selected';
}
} else {
    $paid_all = 'selected';
}
if (isset($_GET['search_keyword'])) {
    $keyword = $_GET['search_keyword'];
}
?>

<div class="row">
    <div class="col-sm-12">
        <form  action="{{route('dashboard.rents.search')}}" method="GET">
            <div class="form-group">
                <label class="col-sm-2">Return Status:</label>
                <div class="col-sm-1">
                    <select class="form-control" name="return">
                        <option value="yes" <?php echo $return_yes; ?>>Yes</option>
                        <option value="no" <?php echo $return_no; ?>>No</option>
                        <option value="all" <?php echo $return_all; ?>>All</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Completely Paid :</label>
                <div class="col-sm-1">
                    <select class="form-control" name="completely_paid">
                        <option value="yes" <?php echo $paid_yes; ?>>Yes</option>
                        <option value="no" <?php echo $paid_no; ?>>No</option>
                        <option value="all" <?php echo $paid_all; ?>>All</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Search :</label>
                <div class="col-sm-2">
                    <input type="text" name="search_keyword" class="form-control" value="<?php echo $keyword; ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <h2>All Rents</h2>
        @if ( !$rents->count() )
        <div class="alert alert-danger" role="alert">No rents available.</div>

        @else
        <a href="{{route('dashboard.rents.create')}}" class="btn btn-default">Add Rent</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Item Name</th>
                    <th>Customer Name</th>
                    <th>Rent Date</th>
                    <th>Expected Return Date</th>
                    <th>Rent Cost</th>
                    <th>Paid Amount</th>
                    <th>Return</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rents as $rent)
                <tr>
                    <td>{{ $rent-> id }}</td>
                    <td>{{ $rent-> item ->name }}</td>
                    <td>{{ $rent-> customer ->customer_name }}</td>
                    <td>{{ $rent-> rent_date }}</td>
                    <td>{{ $rent-> expected_return_date }}</td>
                    <td>
                        <?php
                        $date1 = date_create($rent->rent_date);
                        $date2 = date_create($rent->expected_return_date);
                        $cost = $rent->item->rent_price;

                        $diff = date_diff($date1, $date2);
                        $tot = ($diff->days) * $cost;
                        echo $tot;
                        ?>
                    </td>
                    <td>{{ $rent-> paid_amount }}</td>
                    <td>
                        @if($rent-> rent_return == 0)
                        No
                        @else
                        Yes
                        @endif
                    </td>
                    <td>
                        <a href="{{route('dashboard.rents.edit', [$rent->id])}}" class="btn btn-success">Edit</a>&nbsp;&nbsp;
                        <a href="{{route('dashboard.rents.delete', [$rent->id])}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @endif
    </div>
</div>
@endsection