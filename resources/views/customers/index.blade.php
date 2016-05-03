@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>All Customers</h2>
            <h3><a href="{{route('dashboard.customers.create')}}">New Customer</a></h3>
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
                        <td >
                            <form method="get" action="{{route('dashboard.customers.one',[$customer->id])}}"> 
                                <button type="submit" class="btn btn-primary">View</button> 
                            </form> 
                        </td>
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