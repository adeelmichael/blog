<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        //for viewing all the posts
        $posts = User::all();

        //views here as views are not generated
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
    }

    public function create(User $user)
    {
        $this->authorize('create', $user);
    }

    public function store()
    {

    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
    }

    public function update()
    {

    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
    }
}
