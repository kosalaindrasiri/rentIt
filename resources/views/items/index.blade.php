@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>Available Items</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Purchased Price</th>
                        <th>Rent Price</th>
                        <th>Code</th>
                        <th>Availability</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($items) == 0) {
                        echo '<tr><td colspan="7" style="width:100%" align="center">' . 'No Items Found' . '</td></tr>';
                    } else {
                        ?>
                        <?php
                        foreach ($items as $item) {
                            echo '<tr><td>' . ($item->id) . '</td>';
                            echo '<td>' . ($item->name) . '</td>';
                            echo '<td>' . number_format($item->purchased_price, 2) . '</td>';
                            echo '<td>' . number_format($item->rent_price, 2) . '</td>';
                            echo '<td>' . ($item->code) . '</td>';
                            echo '<td>' . ($item->availability == "1" ? "Yes" : "No") . '</td>';
                            echo '<td>';
                            if ($item->image_url) {
                                ?>
                            <img width="100px" src="{{$item->image_url}}"></img>
                        <?php } ?>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.items.one', [$item -> id]) }}" method="get" >
                                {!! csrf_field() !!} 
                                <button type="submit" class="btn btn-primary">View</button>
                            </form>
                            <?php
                            echo '</td>';
                        }
                        ?>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
