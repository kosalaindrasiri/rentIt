<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Rent;
use App\Item;
use App\Customer;

class RentController extends Controller {

    public function view() {
        $rents = Rent::orderBy('updated_at', 'ASC')->get();
        return view('rent.index', ['rents' => $rents]);
    }

    public function search(Request $request) {
        $return_status = $request->return;
        $paid_status = $request->completely_paid;
        $search_text = $request->search_keyword;
        if ($return_status == 'all') {
            $return_status = '%';
        } elseif ($return_status == "yes") {
            $return_status = '1';
        } else {
            $return_status = '0';
        }
        $rents = Rent::search($search_text, ['item.name' => 10, 'customer.customer_name' => 10])->where('rent_return', 'like', $return_status)->get();

        $filtered = $rents->filter(function ($rent) use ($paid_status) {
            $date1 = date_create($rent->rent_date);
            $date2 = date_create($rent->expected_return_date);
            $cost = $rent->item->rent_price;

            $diff = date_diff($date1, $date2);
            $tot = ($diff->days) * $cost;
            if ($paid_status == 'yes') {
                return ($rent->paid_amount) >= $tot;
            } elseif ($paid_status == 'no') {
                return ($rent->paid_amount) < $tot;
            } else {
                return $rent;
            }
        });

        return view('rent.index', ['rents' => $filtered]);
    }

    public function create() {
        $items = Item::all();
        $customers = Customer::all();
        return view('rent.create')->with(compact(['items', 'customers']));
    }

    public function add(Request $request) {

        $this->validate($request, [
            'item' => 'required',
            'customer' => 'required',
            'rent_date' => 'required|date',
            'expected_return_date' => 'required|date'
        ]);

        $rents = new Rent();
        $rents->item_id = $request->input('item');
        $rents->customer_id = $request->input('customer');
        $rents->rent_date = $request->input('rent_date');
        $rents->expected_return_date = $request->input('expected_return_date');
        $rents->paid_amount = $request->input('paid_amount');
        $rents->save();

        return redirect()->route('dashboard.rents.all')->with('message', 'Rent successfully added.');
    }

    public function edit($id) {
        $items = Item::all();
        $customers = Customer::all();
        $rent = Rent::find($id);
        return view('rent.edit')->with(compact(['items', 'customers', 'rent']));
    }

    public function update(Request $request) {
        $this->validate($request, [
            'item' => 'required',
            'customer' => 'required',
            'rent_date' => 'required|date',
            'expected_return_date' => 'required|date'
        ]);

        $rents = Rent::find($request->input('id'));

        $rents->item_id = $request->input('item');
        $rents->customer_id = $request->input('customer');
        $rents->rent_date = $request->input('rent_date');
        $rents->expected_return_date = $request->input('expected_return_date');
        $rents->paid_amount = $request->input('paid_amount');
        $rents->save();

        return redirect()->route('dashboard.rents.all')->with('message', 'Rent successfully updated.');
    }

    public function delete($id) {
        $rents = Rent::find($id);
        $rents->delete();
        return redirect()->route('dashboard.rents.all')->with('message', 'Rent successfully deleted.');
    }

}
