<?php


namespace App\Http\Controllers\User;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        
        $user = Auth::user();
        

        $bookings = Booking::where('user_id', $user->id)
        ->with('service', 'payment') 
        ->orderBy('date', 'desc')
        ->get();

        return view('website.user-profile', compact('user', 'bookings'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to log in to update your profile.');
        }


        $validated = $request->validate([
            'email' => 'required|email',
            'phone' => 'required|regex:/^07[789][0-9]{7}$/',
            'location' => 'required|string',
            'password' => 'nullable|min:8|confirmed',
        ]);

        
        $user->update($validated);

        return redirect()->route('user.user.profile')->with('success', 'Profile updated successfully');
    }
}
