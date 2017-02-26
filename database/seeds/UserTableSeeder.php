<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            $user = new User;
            $user->name     = $faker->userName()  . $index;
            $user->email    = $faker->email() . $index;
            $user->password = 'admin';

            $user->save();
        }
    }
}
