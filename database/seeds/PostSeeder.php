<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\User;
use App\Category;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = User::all()->first();
        if (!empty($user)){
            for ($i = 0; $i < 30; $i++) {
                $newPost = new Post();
                $newPost->title = $faker->sentence(3, true);
                $newPost->content = $faker->paragraphs(5, true);
                $newPost->image = $faker->imageUrl(640, 480, 'animals', true);
                $newPost->slug = Str::slug($newPost->title . '-' . $i, '-');
    
                $randomUser = User::inRandomOrder()->first();
                $newPost->user_id = $randomUser->id;
                
                $randomCategory = Category::inRandomOrder()->first();
                $newPost->category_id = $randomCategory->id;
                $newPost->save();
            }
        }
    }
}
