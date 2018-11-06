<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        // Create default admin.
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@fancierco.com',
            'password' => bcrypt('admin'),
        ]);

        // Create dummy users.
        for ($i=0; $i<50; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('password'),
            ]);
        }
    }
}
