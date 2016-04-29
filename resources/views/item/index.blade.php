@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>Available Items</h2>
            <?php
            foreach ($items as $item) {
                echo ($item->id) . '</br>';
                echo ($item->name) . '</br>';
                echo ($item->purchased_price) . '</br>';
                echo ($item->rent_price) . '</br>';
                echo ($item->code) . '</br>';
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
@stop