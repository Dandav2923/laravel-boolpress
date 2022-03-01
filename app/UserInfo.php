<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'phone',
        'address',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
