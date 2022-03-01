<?php

use Illuminate\Database\Seeder;
use App\UserInfo;
use App\User;
use Faker\Generator as Faker;
class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $randomIdUserArray = User::inRandomOrder()->get();
        foreach ($randomIdUserArray as $randomUser) {
            $newUserInfo = new UserInfo();
            $newUserInfo->fill(
                [
                    'phone'=> $faker->phoneNumber(),
                    'address'=> $faker->address()
                ]
            );
            $newUserInfo->user_id = $randomUser->id;
            $newUserInfo->save();
        }
    }
}
