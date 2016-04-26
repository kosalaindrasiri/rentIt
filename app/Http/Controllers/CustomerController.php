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
        return view('singleCustomer', ['customers' => $customers]);
    }
    public function updateForm(Request $request, $customer) {
        $customers = Customer::find($customer);
        return view('customerUpdate', ['customers' => $customers]);
    }

    public function update(Request $request, Customer $customer) {
         $v = Validator::make($request->all(), [
                    'name' => 'required',
                    'nic' => 'required|regex:/^[0-9]{9}[vV]$/',
                    'phone' => 'required|phone:LK'
        ]);
        if ($v->fails()) {
            $arr = $v->failed();
            $arrr = $v->messages();
            return Redirect::back()->with('message', $arrr->keys())->withErrors($v)->withInput();
        }
        else{
        $customer->customer_name = $request->input('name');
        $customer->nic = $request->input('nic');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->update();
        session()->flash('updated', 'Successfully updated customer !');
        return redirect()->route('dashboard.customers.all');
    }
    }

    public function delete(Customer $customer) {
        $customer->delete();
        // Session::flash('info', 'This is a message!');
        session()->flash('info', 'Successfully deleted !');
        return redirect()->route('dashboard.customers.all');
    }

    public function add(Request $request) {
        $v = Validator::make($request->all(), [
                    'name' => 'required',
                    'nic' => 'required|regex:/^[0-9]{9}[vV]$/',
                    'phone' => 'phone:LK'
        ]);
        if ($v->fails()) {
            $arr = $v->failed();
            $arrr = $v->messages();
            return Redirect::back()->with('message', $arrr->keys())->withErrors($v)->withInput();
        } else {
            $customer = new Customer();
            $customer->customer_name = $request->input('name');
            $customer->nic = $request->input('nic');
            $customer->phone = $request->input('phone');
            $customer->address = $request->input('address');
            $customer->save();
            session()->flash('created', 'Successfully Created a New customer !');
            return redirect()->route('dashboard.customers.all');
        }
    }

}
