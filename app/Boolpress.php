<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boolpress extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug'
    ];
}
