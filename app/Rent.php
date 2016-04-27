<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model {

    public function item() {
        return $this->belongsTo('App\Item', 'item_id');
    }

    public function customer() {
        return $this->belongsTo('App\Customer', 'customer_id');
    }

}
