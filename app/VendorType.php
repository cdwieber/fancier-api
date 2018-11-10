<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorType extends Model
{
    protected $fillable = [
        'type', 'meta_keys'
    ];

    protected $casts = [
        'meta_keys' => 'array',
    ];
}
