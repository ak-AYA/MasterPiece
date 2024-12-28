<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBookingController extends Controller
{
    // Display the booking page with the selected service
    public function showBookingPage($serviceId)
    {
        $user = Auth::user();
        // Fetch the service by ID
        $service = Service::find($serviceId);


        session()->put('booking', [
            'user_id' => $user->id,
            'service_id' => $service->id,
            'service_name' => $service->name,
            'service_category' => $service->category->name, 
            'price' => $service->price,
            'duration' => $service->duration,
        ]);
        
        session()->save();


        return view('website.booking', compact('user', 'service'));
    }
    


    public function processBooking(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
        ]);

        $booking = session('booking');

        // Update booking details with date and time
        session()->put('booking', array_merge($booking, [
            'date' => $validated['date'],
            'time' => $validated['time'],
        ]));
        session()->save();

        return redirect()->route('user.booking.checkout');
    }

    // Show the checkout page with booking details
    public function showCheckoutPage()
    {
        $booking = session('booking');
        return view('website.checkout', compact('booking'));
    }

    // Process payment and create a booking in the database
    public function processPayment(Request $request)
    {
        $validated = $request->validate([
            'payment_method' => 'required|string', // Ensure payment method is provided
        ]);

        $bookingData = session('booking');

        // Create a new booking in the database
        $booking = Booking::create([
            'user_id' => $bookingData['user_id'],
            'service_id' => $bookingData['service_id'],
            'date' => $bookingData['date'],
            'time' => $bookingData['time'],
            'status' => 'Completed', // Update status based on the payment
            'total_price' => $bookingData['price'],
            'payment_method' => $validated['payment_method'], // Store the payment method
        ]);


        session()->forget('booking');

        return redirect()->route('home')->with('success', 'Booking successfully completed!');
    }
}
