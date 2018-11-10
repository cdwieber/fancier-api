<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    /**
     * Cast tags from JSON to array, cast active attr to bool.
     *
     * @var array
     */
    protected $casts = [
        'tags'      => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Reverse associate User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Associate vendor type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function types()
    {
        return $this->belongsToMany('App\VendorType');
    }
}
