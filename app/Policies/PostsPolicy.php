<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Post;

class PostsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the posts.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $posts
     * @return mixed
     */
    public function view(User $user, Post $posts)
    {
        $roles = Auth::user()->roles;
        $name = $roles[0]->slug;

            if($name === 'user')
            {
                //echo $posts->user_id;
                return $posts->user_id == $user->id;
            }elseif($name === 'admin' || $name === 'manager')
            {
                return true;
            }
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Post $posts)
    {
        $roles = Auth::user()->roles;
        $name = $roles[0]->slug;
        if($name == 'manager' || $name == 'admin')
        {
            return true;
        }else{
            return $posts->user_id == $user->id;
        }
    }

    /**
     * Determine whether the user can update the posts.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $posts
     * @return mixed
     */
    public function update(User $user, Post $posts)
    {
        $roles = Auth::user()->roles;
        $name = $roles[0]->slug;
        if($name == 'manager' || $name == 'admin')
        {
            return true;
        }else{
            return $posts->user_id == $user->id;
        }
    }

    /**
     * Determine whether the user can delete the posts.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $posts
     * @return mixed
     */
    public function delete(User $user, Post $posts)
    {
        $roles = Auth::user()->roles;
        $name = $roles[0]->slug;
        if($name == 'manager' || $name == 'admin')
        {
            return true;
        }else{
            return $posts->user_id == $user->id;
        }
    }

}
