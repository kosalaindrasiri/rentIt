<?php

use App\Item;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    //$items = Item::orderBy('created_at', 'asc')->get();
    $items = Item::orderBy('created_at', 'asc')->get();
    return view('home', ['items'=>$items] );
    
});

Route::post('/additem', function (Request $request) {
    $fileStoreIn = '../public/images/'; 
    $filename = str_random(10);
    $request->file('image')->move($fileStoreIn, $filename.'.jpg');
    $item = new Item();
    $item->name = $request->input('name');
    $item->price = $request->price;
    $item->image_url = '../images/'.$filename.'.jpg';
    var_dump($item);
    $item->save();
    return redirect('/');
});

Route::delete('/delete/{item}', function (Item $item){
    $item ->delete();
    return redirect('/');
});

Route::get('/viewitem/{item}', function (Item $item){
    return view('viewitem', ['item'=>$item] );
    //return redirect('/');
});

Route::get('/updateitem/{item}', function (Item $item){
   return view('updateitem', ['item'=>$item] );
    
});

Route::post('/update/{item}', function (Request $request,  Item $item){
    $item->name = $request->name;
    $item->price = $request->price;
    $item->update();
    return redirect('/');
    
});

Route::get('/rentitem', function (){
   return view('rentitem');
});


Route::post('/rentitem', function (Request $request) {
    $rentitem = new \App\Rent_Detail();
    $rentitem->item_id = $request->input('item');
    $rentitem->nic = $request->input('nic');
    $rentitem->rent_date_and_time = $request->input('rentdate');
    $rentitem->paid = $request->input('paidamnt');
    $rentitem->save();
    return redirect('/');
});