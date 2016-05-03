<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Item;
use File;

class ItemsController extends Controller {

    public function create() {
        return view('items.create');
    }

    public function showAll() {
        $items = Item::orderBy('created_at', 'asc')->get();
        return view('items.index', ['items' => $items]);
    }

    public function addItem(Request $request) {
        $v = Validator::make($request->all(), [
                    'name' => 'required',
                    'purchased_price' => 'required|regex:/^\d*(\.\d{2})?$/',
                    'rent_price' => 'required|regex:/^\d*(\.\d{2})?$/',
        ]);
        if ($v->fails()) {
            return Redirect::back()->withErrors($v)->withInput();
        } else {
            $fileStoreIn = '../public/images/';
            $filename = str_random(10);

            $item = new Item();
            if ($request->hasFile('image')) {
                $img_ext = substr($request->file('image')->getClientMimeType(), 6);
                $request->file('image')->move($fileStoreIn, $filename . '.' . $img_ext);
                $item->image_url = '/images/' . $filename . '.' . $img_ext;
            }
            $item->name = $request->input('name');
            $item->rent_price = $request->rent_price;
            $item->purchased_price = $request->purchased_price;
            $item->code = $request->code;
            $item->availability = $request->availability;

            $item->save();
            session()->flash('message', 'New Item added successfully !');
            return redirect()->route('dashboard.items.all');
        }
    }

    public function delete(Item $item) {
        if ($item->image_url) {
            $old_img = $item->image_url;
            File::delete('../public' . $old_img);
        }
        $item->delete();
        session()->flash('message', 'Item deleted successfully !');
        return redirect()->route('dashboard.items.all');
    }

    public function view(Item $item) {
        return view('items.single', ['item' => $item]);
    }

    public function updateForm(Item $item) {
        return view('items.edit', ['item' => $item]);
    }

    public function update(Request $request, Item $item) {
        $v = Validator::make($request->all(), [
                    'name' => 'required',
                    'purchased_price' => 'required|regex:/^\d*(\.\d{2})?$/',
                    'rent_price' => 'required|regex:/^\d*(\.\d{2})?$/',
        ]);
        if ($v->fails()) {
            return Redirect::back()->withErrors($v)->withInput();
        } else {
            if ($request->hasFile('image')) {
                $fileStoreIn = '../public/images/';
                if ($item->image_url) {
                    $old_img = $item->image_url;
                    File::delete('../public' . $old_img);
                }
                $filename = str_random(10);
                $img_ext = substr($request->file('image')->getClientMimeType(), 6);
                $request->file('image')->move($fileStoreIn, $filename . '.' . $img_ext);
                $item->image_url = '/images/' . $filename . '.' . $img_ext;
            }
            $item->name = $request->name;
            $item->rent_price = $request->rent_price;
            $item->purchased_price = $request->purchased_price;
            $item->code = $request->code;
            $item->availability = $request->availability;
            $item->update();
            session()->flash('message', 'Item updated successfully !');
            return redirect()->route('dashboard.items.all');
        }
    }

}
