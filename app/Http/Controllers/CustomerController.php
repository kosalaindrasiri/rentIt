<?php

namespace App\Http\Controllers;
//use Session;
//use App\Http\Controllers\Validator;
use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller {

    public function create() {
        return view('createCustomer');
    }

    public function showAll() {
        $customers = Customer::All();
        return view('customers', ['customers' => $customers]);
    }

    public function view(Request $request, $customer) {
        $customers = Customer::find($customer);
        return view('customerUpdate', ['customers' => $customers]);
    }

    public function update(Request $request, Customer $customer) {
        $customer->customer_name = $request->input('name');
        $customer->nic = $request->input('nic');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->update();
        session()->flash('updated','Successfully Created a New customer !');
        return redirect()->route('dashboard.customers.all');
    }

    public function delete(Customer $customer) {
        $customer->delete();
      // Session::flash('info', 'This is a message!');
        session()->flash('info','Successfully deleted !');
        return redirect()->route('dashboard.customers.all');
    }

    public function add(Request $request) {
        $v = Validator::make($request->all(), [
                    'name' => 'required',
                    'nic' => 'required'
        ]);
        if ($v->fails()) {
            //return $v->errors();
            // return redirect()->back()->with('message','Operation Successful !');
            return Redirect::back()->withErrors($v);
//           return redirect()->back()->withErrors($v);
        } else {
            $customer = new Customer();
            $customer->customer_name = $request->input('name');
            $customer->nic = $request->input('nic');
            $customer->phone = $request->input('phone');
            $customer->address = $request->input('address');
            $customer->save();
             session()->flash('created','Successfully Created a New customer !');
            return redirect()->route('dashboard.customers.all');
        }
    }

}
