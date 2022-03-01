<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 30; $i++) {
            $newUser = new User();
            $newUser->name = $faker->userName();
            $newUser->email = $faker->email();
            $password = "12345678";
            $newUser->password = Hash::make($password);
            $newUser->save();
        }
    }
}
