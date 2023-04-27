<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|max:255',
        ]);

        $user = User::create($validatedData);

        session()->flash('success', 'User ' . $user->name . ' created successfully.');

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id . '|max:255',
            'password' => 'nullable|max:255',
        ]);

        $user->update($validatedData);

        session()->flash('success', 'User ' . $user->name . ' updated successfully.');

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('success', 'User ' . $user->name . ' deleted successfully.');

        return redirect()->route('users.index');
    }
}
