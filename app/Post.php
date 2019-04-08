<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description'
    ];

    //user
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //creating post
    public function createPost($user_id, $title, $desc)
    {
        $posts = Post::create([
            'user_id' => $user_id,
            'title' => $title,
            'description' => $desc
        ]);

        return $posts;
    }
}
