<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    public function budgets()
    {
        return $this->hasMany('App\Budget');
    }
}
