<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function index(User $user, Post $post)
    {
        if($user->inRole() == 'user')
        {
            return Auth::user()->post;
        }else{
            return Post::all();
        }

    }

    public function store(Post $post, Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $title = $request->title;
        $desc = $request->description;

        $posts = $post->createPost($user_id, $title, $desc);
    }

    public function update(Request $request, User $user, $id)
    {
        $user = Auth::user();
        $user_id = $user->id;
        if($user->inRole() == 'user')
        {
            $post = Post::find($id);
            $post->update($request->only(['title', 'description']));
            return response()->json(['success' => 'Post Has been updated successfully.']);
        }else{
            $post->update($request->only(['title', 'description']));
            return response()->json(['success' => 'Post Has been updated successfully.']);
        }
    }

    public function destroy(Post $posts)
    {
        $post->delete();

        return response()->json(null, 204);
    }
}