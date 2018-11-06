<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    public function vendor_type() {
        return $this->hasMany('App\VendorType');
    }
}
