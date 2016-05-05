<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Rent;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;

class CustomerController extends Controller {

    public function create() {
        return view('customers.create');
    }

    public function showAll() {
        $customers = Customer::All();
        return view('customers.index', ['customers' => $customers]);
    }

    public function view($customer) {
        $customers = Customer::find($customer);
        return view('customers.single', ['customers' => $customers]);
    }

    public function updateForm($customer) {
        $customers = Customer::find($customer);
        return view('customers.edit', ['customers' => $customers]);
    }

    public function update(Request $request, Customer $customer) {
        $v = Validator::make($request->all(), [
                    'name' => 'required',
                    'nic' => 'required|regex:/^[0-9]{9}[vV]$/',
                    'phone' => 'required|phone:LK'
        ]);
        if ($v->fails()) {
            return Redirect::back()->withErrors($v)->withInput();
        } else {
            $customer->customer_name = $request->input('name');
            $customer->nic = $request->input('nic');
            $customer->phone = $request->input('phone');
            $customer->address = $request->input('address');
            $customer->update();
            session()->flash('message', 'Successfully updated customer !');
            return redirect()->route('dashboard.customers.all');
        }
    }

    public function delete(Customer $customer) {
        $customer->delete();
        session()->flash('message', 'Successfully deleted !');
        return redirect()->route('dashboard.customers.all');
    }

    public function add(Request $request) {
        $v = Validator::make($request->all(), [
                    'name' => 'required',
                    'nic' => 'required|regex:/^[0-9]{9}[vV]$/',
                    'phone' => 'required|phone:LK'
        ]);
        if ($v->fails()) {
            return Redirect::back()->withErrors($v)->withInput();
        } else {
            $customer = new Customer();
            $customer->customer_name = $request->input('name');
            $customer->nic = $request->input('nic');
            $customer->phone = $request->input('phone');
            $customer->address = $request->input('address');
            $customer->save();
            session()->flash('message', 'New customer Created Successfully !');
            return redirect()->route('dashboard.customers.all');
        }
    }

    public function rents($customer) {
        $rentRecords = Rent::where('customer_id', '=', $customer)->get()->all();
            return response()->json($rentRecords);
    }

}
