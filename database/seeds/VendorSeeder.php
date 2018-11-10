<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\User;
use App\Vendor;
use App\VendorType;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Fakes 20 of each vendor type.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $vendor_type_count = VendorType::all()->count();

        for ($vendor_type = 0; $vendor_type <= $vendor_type_count; $vendor_type++) {
            for ($i = 0; $i < 20; $i++) {
                $user_data = [
                    'name'     => $faker->name,
                    'email'    => $faker->email,
                    'password' => bcrypt('secret'),
                ];

                $vendor = new Vendor([
                    'business_name' => $faker->company,
                    'website'       => $faker->domainName,
                    'facebook'      => $faker->userName,
                    'instagram'     => $faker->userName,
                    'twitter'       => '@' . $faker->userName,
                    'city'          => 'Milwaukee',
                    'state'         => 'WI',
                    'type_id'       => $vendor_type,
                    'active'        => 1,
                ]);

                $user = User::create($user_data);
                $user->vendor()->save($vendor);
            }
        }

    }
}
