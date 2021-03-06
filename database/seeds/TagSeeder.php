<?php

use Illuminate\Database\Seeder;
use App\Tag;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayTags = [
            'Animal',
            'Technology',
            'Science',
            'Geography',
            'Math'
        ];

        foreach ($arrayTags as  $item) {
            $newTag = new Tag();
            $newTag->name = $item;
            $newTag->save();
        }
    }
}
