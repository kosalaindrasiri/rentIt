<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Item;

class ItemsController extends Controller {

    public function showAll() {
        $items = Item::orderBy('created_at', 'asc')->get();
        return view('home', ['items' => $items]);
    }
    
    public function addItem(Request $request){
        $fileStoreIn = '../public/images/'; 
        $filename = str_random(10);
        $request->file('image')->move($fileStoreIn, $filename);
        $item = new Item();
        $item->name = $request->input('name');
        $item->price = $request->price;
        $item->image_url = '/images/'.$filename;
        var_dump($item);
        $item->save();
        return redirect()->route('dashboard.home');
    }
    
    public function delete(Item $item){
        $item ->delete();
         return redirect()->route('dashboard.home');
    }
    
    public function view(Item $item){
        return view('viewitem', ['item'=>$item] );
    }
    
    public function updateForm(Item $item){
        return view('updateitem', ['item'=>$item] );
    }
    
    public function update(Request $request,  Item $item ){
        $item->name = $request->name;
        $item->price = $request->price;
        $item->update();
        return redirect()->route('dashboard.home');
    }
    
}
