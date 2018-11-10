<?php

use Illuminate\Database\Seeder;
use App\VendorType;

class VendorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'planning',
            'floral',
            'venue',
            'cinemetography',
            'photography',
            'stationery',
            'catering',
            'desserts',
            'music',
            'grooming',
            'rentals',
            'attire',
        ];

        foreach ($types as $type) {
            $vendor_type = new VendorType();
            $vendor_type->type = $type;
            $vendor_type->save();
        }
    }
}
