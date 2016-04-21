<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\RentDetail;

class RentController extends Controller
{
    public function view(){
        $rentrecord = RentDetail::orderBy('created_at', 'asc')->get();
        return view('rentitem', ['rentlist'=>$rentrecord] );
    }
    
    public function add(Request $request) {
        $rentitem = new \App\RentDetail();
        $rentitem->item_id = $request->input('item');
        $rentitem->nic = $request->input('nic');
        $rentitem->rent_date_and_time = $request->input('rentdate');
        $rentitem->paid = $request->input('paidamnt');
        $rentitem->save();
        
        return redirect()->route('dashboard.rents.all');
    }
           
}
