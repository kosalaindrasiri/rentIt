<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class homePageController extends Controller
{
    public function showAll() {
            return view('home');
    }
}
