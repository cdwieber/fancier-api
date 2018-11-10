<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Wedding;

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
            'name'       => 'admin',
            'email'      => 'admin@fancierco.com',
            'password'   => bcrypt('admin'),
        ]);

        // Create dummy users.
        for ($i=0; $i<50; $i++) {
            $user_data = [
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('password'),
            ];

            $user = User::create($user_data);
            $wedding = $user->wedding()->create(['date' => $faker->dateTimeBetween('now', '+2 years')]);
            $user->wedding()->associate($wedding);
            $user->save();
        }
    }
}
