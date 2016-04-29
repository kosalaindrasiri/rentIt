<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ReturnController extends Controller
{
    public function addWindow() {
        $customers = Customer::all();
        return view('return.add')->with(compact(['items', 'customers']));    
        
    }
}
