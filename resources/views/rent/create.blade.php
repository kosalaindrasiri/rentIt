@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h2>You can rent an item here</h2>
        <form action="{{route('rents.add')}}" method="POST" class="form-horizontal">
            <div class="form-group">
                <label for="selectItem" class="col-sm-2 control-label">Item:</label>
                <div class="col-sm-4">
                    <select name="item_name" class="form-control" id="selectItem">
                        <option disabled selected value>-- Select --</option>
                        @foreach($items as $item)
                        <option value="{{$item->id}}" data-price="{{$item->rent_price}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="selectCustomer" class="col-sm-2 control-label">Customer:</label>
                <div class="col-sm-4">
                    <select name="customer_name" class="form-control" id="selectCustomer">
                        <option disabled selected value>-- Select --</option>
                        @foreach($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputRentdate" class="col-sm-2 control-label">Rent Date:</label>
                <div class="col-sm-4">
                    <input type="text" name="rent_date" class="form-control" id="inputRentdate" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputReturndate" class="col-sm-2 control-label">Expected Return Date:</label>
                <div class="col-sm-4">
                    <input type="text" name="rent_expect_date" class="form-control" id="inputReturndate" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputCost" class="col-sm-2 control-label">Rent Cost:</label>
                <div class="col-sm-4">
                    <input type="text" name="rent_cos   t" class="form-control" id="inputCost" disabled />
                </div>
            </div>            
            <div class="form-group">
                <label for="inputPaidamount" class="col-sm-2 control-label">Paid Amount:</label>
                <div class="col-sm-4">
                    <input type="number" name="paid_amount" class="form-control" id="inputPaidamount" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <button type="submit" class="btn btn-default">Add Rent</button>
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
            dateFormat: "MM d, yy",
            numberOfMonths: 2,
            onSelect: function (selected) {
                $("#inputReturndate").datepicker("option", "minDate", selected)
            }
        });
        $("#inputReturndate").datepicker({
            dateFormat: "MM d, yy",
            numberOfMonths: 2,
            onSelect: function (selected) {
                $("#inputRentdate").datepicker("option", "maxDate", selected);

                var date1 = $('#inputRentdate').datepicker("getDate");
                var date2 = $('#inputReturndate').datepicker("getDate");                
                var cost = $('#selectItem :selected').attr("data-price");
                
                var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                var diff = Math.ceil(timeDiff / (1000 * 3600 * 24));

                var tot = diff * cost;

                $('#inputCost').val(tot);
            }
        });
    });

</script>

@endsection