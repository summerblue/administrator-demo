<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\User;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = User::all()->pluck('id')->toArray();

        foreach(range(1, 100) as $index)
        {
            Post::create([
                'title'         => $faker->sentence(),
                'body'          => $faker->text(),
                'user_id'       => $faker->randomElement($users),
                'created_at'    => Carbon::now()->toDateTimeString(),
                'updated_at'    => Carbon::now()->toDateTimeString(),
            ]);
        }
    }
}
