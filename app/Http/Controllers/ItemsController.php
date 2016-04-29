<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Item;

class ItemsController extends Controller {

    public function create() {
        return view('item.create');
    }

    public function showAll() {
        $items = Item::orderBy('created_at', 'asc')->get();
        return view('item.index', ['items' => $items]);
    }

    public function addItem(Request $request) {
        $fileStoreIn = '../public/images/';
        $filename = str_random(10);

        $img_ext = substr($request->file('image')->getClientMimeType(), 6);
        if ($request->hasFile('image')) {
            $request->file('image')->move($fileStoreIn, $filename . '.' . $img_ext);
        }
        $item = new Item();
        $item->name = $request->input('name');
        $item->rent_price = $request->rent_price;
        $item->purchased_price = $request->purchased_price;
        $item->code = $request->code;
        $item->availability = $request->availability;
        $item->image_url = '/images/' . $filename . '.' . $img_ext;

        $item->save();
        return redirect()->route('dashboard.items.all');
    }

    public function delete(Item $item) {
        $item->delete();
        return redirect()->route('dashboard.items.all');
    }

    public function view(Item $item) {
        return view('item.single', ['item' => $item]);
    }

    public function updateForm(Item $item) {
        return view('item.edit', ['item' => $item]);
    }

    public function update(Request $request, Item $item) {
        $item->name = $request->name;
        $item->rent_price = $request->rent_price;
        $item->purchased_price = $request->purchased_price;
        $item->code = $request->code;
        $item->availability = $request->availability;
        $item->update();
        return redirect()->route('dashboard.items.all');
    }

}
