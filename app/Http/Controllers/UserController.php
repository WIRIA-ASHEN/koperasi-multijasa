<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        $keyword = $request->input('search');

        $users = User::where('name', 'LIKE', '%' . $keyword . '%')->get();

        return view('user.index', compact('users'));
    }

    public function tambah()
    {
        return view('user.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);
    
        // Hash the password
        $hashedPassword = Hash::make($request->input('password'));
    
        // Create a new user with the hashed password
        User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $hashedPassword,
            'role' => $request->input('role'),
        ]);
    
        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);

        return view('user.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
         // Validate the request data
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required',
            'role' => 'required',
        ]);

        // Hash the updated password
        $hashedPassword = Hash::make($request->input('password'));

        // Find the user by ID
        $user = User::find($id);

        // Update the user with the hashed password
        $user->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $hashedPassword,
            'role' => $request->input('role'),
        ]);

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function hapus($id)
    {
        // Delete the user
        $users = User::find($id);
        $users->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
