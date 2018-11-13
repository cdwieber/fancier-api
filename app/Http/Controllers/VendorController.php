<?php

namespace App\Http\Controllers;

use App\VendorType;
use App\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getJson($type = null)
    {
        if ($type) {
            $vendor_type = VendorType::where('type', '=', $type)->first();

            $vendors = Vendor::with('images')->where('type_id', '=', $vendor_type->id)->get();
        } else {
            $vendors = Vendor::with('images')->get();
        }

        return $vendors->toJson();
    }
}
