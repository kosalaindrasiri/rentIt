@extends('layouts.app')
@section('content')
<script type="text/javascript">

    function changeFunc() {
        var selectCustomer = document.getElementById("selectCustomer");
        var selectedValue = selectCustomer.options[selectCustomer.selectedIndex].value;
        alert(selectedValue);
        //xhttp.open("GET", "dashboard/selectedCusRentRecords/" + var selectedValue, true);
        //xhttp.send();
    }

    $(document).ready(function () {
        $("#selectCustomer").change(function () {
            var selectedValue = this.value;
            $.get("/dashboard/customers/" + selectedValue + "/rents/", function (data, stat) {
                $("#content").html(data);
            });
        });
    });

</script>
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <h2>Add Return</h2>
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
            <div id="content"></div>
        </div>
    </div>
</div>

@stop