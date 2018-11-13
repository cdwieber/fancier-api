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
        // Init faker.
        $faker = Factory::create();

        // Get a count of existing vendor types.
        $vendor_type_count = VendorType::all()->count();

        error_log($vendor_type_count);

        // This loop runs as many times as we have vendor types.
        for ($vendor_type = 0; $vendor_type <= $vendor_type_count; $vendor_type++) {
            error_log("NEW TYPE--------- " . $vendor_type);
            // This nested loop creates a pre-determined amount of each vendor type.
            for ($i = 0; $i < 10; $i++) {
                error_log("vendor: ".$i);
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

                // This extra nested loop assigns a few real images to the currently instantiated vendor.
                for ($ii=0; $ii<rand(1, 10); $ii++) {
                    $vendor->images()->create(['url' => $this->randomImage()]);
                }
            }
        }
    }

    /**
     * Randomize some real image URLs.
     *
     * @return string
     */
    private function randomImage()
    {
        $urls = [
            'http://fanciermag.com/wp-content/uploads/sites/5087/2018/10/milwaukee-wedding-photography-kimpton-journeyman-sarah-glick-11.jpg',
            'http://fanciermag.com/wp-content/uploads/sites/5087/2018/10/KimptonShootLR91.jpg',
            'http://fanciermag.com/wp-content/uploads/sites/5087/2018/10/FarmatDover1960sInspirationWeddingShoot_0066.jpg',
            'http://fanciermag.com/wp-content/uploads/sites/5087/2018/07/engagement-photo-ideas-milwaukee-wisconsin-36.jpg',
            'http://fanciermag.com/wp-content/uploads/sites/5087/2018/06/alexandra-lee-photography-76.jpg',
            'http://fanciermag.com/wp-content/uploads/sites/5087/2018/06/fancier-mag-wedding-inspiration-boho-rhode-island-13.jpg',
            'http://fanciermag.com/wp-content/uploads/sites/5087/2018/05/50-ann-arbor-detroit-wedding-planner-modern-photographer.jpg',
            'http://fanciermag.com/wp-content/uploads/sites/5087/2018/05/129-milwaukee-wedding-photography-modern-unadorned-magazine-e1526665681434.jpg',
            'http://fanciermag.com/wp-content/uploads/sites/5087/2018/05/over_the_vines_wisconsin_midwestern_bride_wedding_photography-80-e1526915841781.jpg',
            'http://fanciermag.com/wp-content/uploads/sites/5087/2018/05/over_the_vines_wisconsin_midwestern_bride_wedding_photography-121.jpg',
            'http://fanciermag.com/wp-content/uploads/sites/5087/2018/05/over_the_vines_wisconsin_midwestern_bride_wedding_photography-153.jpg',
        ];

        return $urls[rand(0, (count($urls)-1))];
    }
}
