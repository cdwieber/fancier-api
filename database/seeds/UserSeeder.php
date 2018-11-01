<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create default admin.
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@fancierco.com',
            'password' => bcrypt('admin'),
        ]);

        // Create dummy users.
        for ($i=0; $i<50; $i++) {
            DB::table('users')->insert([
                'name' => str_random(10),
                'email' => str_random(10) . '@gmail.com',
                'password' => bcrypt('secret'),
            ]);
        }
    }
}
