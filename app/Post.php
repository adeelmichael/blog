<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description'
    ];

    //user
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
