<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Provider; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProviderRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('website.provider-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:providers',
            'phone' => 'required|string|max:15', 
            'location' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
       
        Provider::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'password' => Hash::make($request->password),
            'role_id' => 3,
        ]);

        return redirect('/')->with('success', 'Register successfully!');
    }
}
