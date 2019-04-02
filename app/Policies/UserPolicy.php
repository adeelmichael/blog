<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view()
    {
        $roles = Auth::user()->roles;
        $name = $roles[0]->slug;
        if($name === 'admin')
        {
            return true;
        }else
        {
            return false;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create()
    {
        $roles = Auth::user()->roles;
        $name = $roles[0]->slug;
        if($name === 'admin')
        {
            return true;
        }else
        {
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update()
    {
        $roles = Auth::user()->roles;
        $name = $roles[0]->slug;
        if($name === 'admin')
        {
            return true;
        }else
        {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete()
    {
        $roles = Auth::user()->roles;
        $name = $roles[0]->slug;
        if($name === 'admin')
        {
            return true;
        }else
        {
            return false;
        }
    }
}
