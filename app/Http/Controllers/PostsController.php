<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
class PostsController extends Controller
{

    public function index()
    {
        //for viewing all the posts
        $posts = Post::all();

        //views here as views are not generated
    }

    public function viewPosts(Post $posts)
    {
        $this->authorize('view', $posts);
    }

    public function create()
    {
        $this->authorize('create', $posts);
    }

    public function store()
    {

    }

    public function edit(Post $posts)
    {
        $this->authorize('update', $posts);
    }

    public function update()
    {

    }

    public function destroy(User $user, Post $posts)
    {
        $this->authorize('delete', $posts);
    }
}
