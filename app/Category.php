<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'updated_at'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function createSlug($name)
    {
        $slug = Str::slug($name, '-');

        $oldCategory = Category::where('slug', $slug)->first();

        $counter = 0;
        while ($oldCategory) {
            $newSlug = $slug . '-' . $counter;
            $oldCategory = Category::where('slug', $newSlug)->first();
            $counter++;
        }

        return (empty($newSlug)) ? $slug : $newSlug;
    }
}
