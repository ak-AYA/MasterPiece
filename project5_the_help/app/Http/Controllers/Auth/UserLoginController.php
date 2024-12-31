<?php



namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{

    public function showLoginForm(Request $request)
    {
        // Store the intended URL in the session
        $request->session()->put('url.intended', url()->previous());
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
            // Redirect to the intended URL or fallback to a default route
            return redirect()->intended('/')->with('success', 'User logged in successfully!');
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }


    public function logout()
    {
        session()->forget('booking');

        Auth::guard('web')->logout(); 
        return redirect()->route('website.index')->with('success', 'Logged out successfully!');
    }
}