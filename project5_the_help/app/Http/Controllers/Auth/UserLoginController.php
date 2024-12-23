<?php



namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{

    public function showLoginForm()
    {
        return view('website.user-login');
    }


    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::guard('web')->attempt(
        [
            'email' => $request->email,
            'password' => $request->password
        ],
        $request->remember
    )) {
        return redirect()->route('website.index')->with('success', 'User logged in successfully!');
    }

    return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
}


    public function logout()
    {
        Auth::guard('web')->logout(); 
        return redirect()->route('/')->with('success', 'Logged out successfully!');
    }
}

