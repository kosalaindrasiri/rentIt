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
                    <select name="item_name" class="form-control" id="selectItem">
                        <option disabled value>-- Select --</option>
                        @foreach($items as $item)
                        <option @if ($item -> id === $rent -> item_id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="selectCustomer" class="col-sm-2 control-label">Customer:</label>
                <div class="col-sm-4">
                    <select name="customer_name" class="form-control" id="selectCustomer">
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
                    <input type="date" name="rent_date" class="form-control" id="inputRentdate" value="{{ $rent->rent_date }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputReturndate" class="col-sm-2 control-label">Expected Return Date:</label>
                <div class="col-sm-4">
                    <input type="date" name="rent_expect_date" class="form-control" id="inputReturndate" value="{{ $rent->rent_expect_date }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputPaidamount" class="col-sm-2 control-label">Paid Amount:</label>
                <div class="col-sm-4">
                    <input type="number" name="paid_amount" class="form-control" id="inputPaidamount" value="{{ $rent->paid_amount }}" />
                </div>
            </div>
            <div class="form-group">
                <label for="selectReturn" class="col-sm-2 control-label">Return:</label>
                <div class="col-sm-4">
                    <select name="rent_return" class="form-control" id="selectReturn">                        
                        <option @if($rent->rent_return == 0) selected @endif value="0">No</option>
                        <option @if($rent->rent_return == 1) selected @endif value="1">Yes</option>
                    </select>
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
@endsection