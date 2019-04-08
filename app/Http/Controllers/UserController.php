<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(User $user)
    {
        $this->authorize('view', $user);
        return User::all();
    }

    public function store()
    {
        $this->authorize('create', $user);
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json(['success' => 'User Created successfully'], 200);
    }

    public function update(Request $request, User $user, $id)
    {
            $user = User::find($id);
            $user->update($request->only(['name', 'email']));
            return response()->json(['success' => 'User Has been updated successfully.'], 200);

    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();

        return response()->json(null, 204);
    }
}
