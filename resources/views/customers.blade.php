@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            @if(Session::has('updated'))
            <p class="alert alert-success">
                {{ Session::get('updated') }}
                @endif
            </p>
            @if(Session::has('created'))
            <p class="alert alert-success">
                {{ Session::get('created') }}
                @endif
            </p>

            @if(Session::has('info'))
            <p class="alert alert-success">
                {{ Session::get('info') }}
                @endif
            </p>

            <h2>All Customers</h2>
            <h3><a href="{{route('customers.create')}}">New Customer</a></h3>
            <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>NIC</th>
        <th>Phone</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
            
            
            
                <?php
                if (count($customers) == 0) {
                    echo '<tr><td colspan="5" style="width:100%" align="center">' . 'No Customers Found' . '</td></tr>';
                } else {
                    foreach ($customers as $customer) {
                        echo '<tr><td>' . ($customer->id) . '</td>';
                        echo '<td>' . ($customer->customer_name) . '</td>';
                        echo '<td>' . ($customer->nic) . '</td>';
                        echo '<td>' . ($customer->phone) . '</td>';
                        echo '<td>' . ($customer->address) . '</td>';
                        ?>
                       <td> <form method="get" action="{{route('dashboard.customers.one',[$customer->id])}}"> 
                                <button type="submit">Update Customer</button> 
                            </form> 
                        
                        <form action="{{ url('customers/'.$customer->id) }}" method="POST" >
                                {!! csrf_field() !!} {!! method_field('DELETE') !!}
                                <button type="submit">Delete</button>
                            </form> 
                       </td> </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
@stop