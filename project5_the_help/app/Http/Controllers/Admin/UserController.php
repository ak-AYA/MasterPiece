<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // Display list of users
    public function index()
    {
        $users = User::where('role_id', 2)->paginate(10); // '2' corresponds to 'User'
        return view('admin.users.index', compact('users'));
    }

    // Update user details
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        $user = User::findOrFail($request->id);
        $user->update($validated);

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

   

    // Store a new user
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8',
        'phone' => 'required|string|max:15',
        'location' => 'required|string|max:255',
        'status' => 'boolean',

    ]);

    // Create the user with a static role_id of 2
    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'phone' => $validated['phone'],
        'location' => $validated['location'],
        'status' => $validated['status'],
        'role_id' => 2,  // Static role_id for all users
    ]);

    return redirect()->route('admin.users')->with('success', 'User added successfully.');

}


     
}
