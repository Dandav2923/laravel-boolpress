<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        $tags = Tag::all();
        foreach ($posts as $post) {
            $randomTag = Tag::inRandomOrder()->first()->id;
            $post->tags()->attach($randomTag);
            foreach ($tags as $tag) {
                $rand = random_int(0, 4);
                if ((bool) $rand){
                    if ($randomTag != $tag->id) {
                        $post->tags()->attach($tag->id);
                    }
                }
            }
        }
    }
}
