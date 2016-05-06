@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h2>Edit Rent - {{ $rent->id }}</h2>

        <form action="{{route('rents.update')}}" method="POST" class="form-horizontal">
            <input type="hidden" name="id" value="{{ $rent->id }}" />
            <div class="form-group">
                <label for="selectItem" class="col-sm-2 control-label">Item:</label>
                <div class="col-sm-4">
                    <select name="item" class="form-control" id="selectItem">
                        <option disabled value>-- Select --</option>
                        @foreach($items as $item)
                        <option @if ($item -> id === $rent -> item_id) selected @endif value="{{ $item->id }}" data-price="{{$item->rent_price}}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="selectCustomer" class="col-sm-2 control-label">Customer:</label>
                <div class="col-sm-4">
                    <select name="customer" class="form-control" id="selectCustomer">
                        <option disabled value>-- Select --</option>
                        @foreach($customers as $customer)
                        <option @if ($item -> id === $rent -> customer_id) selected @endif value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputRentdate" class="col-sm-2 control-label">Rent Date:</label>
                <div class="col-sm-4">
                    <input type="text" name="rent_date" class="form-control" id="inputRentdate" value="{{ $rent->rent_date }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputReturndate" class="col-sm-2 control-label">Expected Return Date:</label>
                <div class="col-sm-4">
                    <input type="text" name="expected_return_date" class="form-control" id="inputReturndate" value="{{ $rent->expected_return_date }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputCost" class="col-sm-2 control-label">Rent Cost:</label>
                <div class="col-sm-4">
                    <?php
                    $date1 = date_create($rent->rent_date);
                    $date2 = date_create($rent->expected_return_date);
                    $cost = $rent->item->rent_price;

                    $diff = date_diff($date1, $date2);
                    $tot = ($diff->days) * $cost;
                    ?>
                    <input type="text" name="rent_cost" class="form-control" id="inputCost" disabled="disabled" value="<?php echo $tot; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputPaidamount" class="col-sm-2 control-label">Paid Amount:</label>
                <div class="col-sm-4">
                    <input type="number" name="paid_amount" class="form-control" id="inputPaidamount" value="{{ $rent->paid_amount }}" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-default">Update Rent</button>
                </div>
            </div>
        </form>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {

        $("#inputRentdate").datepicker({
            dateFormat: "yy/mm/dd",
            numberOfMonths: 2,
            onSelect: function (selected) {
                $("#inputCost").val('');
                $("#inputReturndate").val('');
                $("#inputReturndate").datepicker("option", "minDate", selected);
            }
        });

        $("#inputReturndate").datepicker({
            dateFormat: "yy/mm/dd",
            numberOfMonths: 2,
            onSelect: function (selected) {
                $("#inputRentdate").datepicker("option", "maxDate", selected);

                var date1 = $('#inputRentdate').datepicker("getDate");
                var date2 = $('#inputReturndate').datepicker("getDate");
                var cost = $('#selectItem :selected').attr("data-price");

                var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                var diff = Math.ceil(timeDiff / (1000 * 3600 * 24));
                var tot = diff * cost;

                if (diff == 0) {
                    $('#inputCost').val(cost);
                } else {
                    $('#inputCost').val(tot);
                }
            }
        });
    });

</script>

@endsection