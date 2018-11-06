<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function types()
    {
        return $this->belongsToMany('App\VendorType');
    }
}
