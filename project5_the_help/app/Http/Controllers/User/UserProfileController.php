<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Review;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        //  dd($user);

        // Fetch reviews left by the user
        $reviews = Review::where('user_id', $user->id)
            ->with(['booking.service'])
            ->get();
    
        // Fetch user's completed bookings without reviews
        $completedBookings = Booking::where('status', 'completed')
        ->doesntHave('reviews')
        ->get();

        $bookings = Booking::where('user_id', $user->id)->paginate(5);
        
        return view('website.user-profile', compact('user', 'completedBookings', 'reviews', 'bookings'));
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'stars' => 'required|integer|min:1|max:5',
            'text' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'booking_id' => 'required|exists:bookings,id',
        ]);
    
        // Ensure the booking is completed
        $booking = Booking::where('id', $validated['booking_id'])
            ->where('status', 'completed')
            ->firstOrFail();
    
        $review = new Review();
        $review->stars = $validated['stars'];
        $review->text = $validated['text'];
        $review->booking_id = $booking->id;
        $review->user_id = auth()->id();
        $review->provider_id = $booking->service->provider_id;
        $review->date = now();
    
        if ($request->hasFile('image')) {
            $review->image = $request->file('image')->store('reviews', 'public');
        }
    
        $review->save();
    
        return redirect()->back()->with('success', 'Review added successfully.');
    }
}
