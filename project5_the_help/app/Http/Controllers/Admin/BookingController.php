<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use App\Models\Payment;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    // Show all bookings (for admin)
    public function index()
    {
        $bookings = Booking::with(['user', 'service', 'payment' ])->get();
        $users = User::all();
        $services = Service::all();
        $payments = Payment::all();
        $discounts = Discount::all();
    
        return view('admin.bookings.index', compact('bookings', 'users', 'services', 'payments', 'discounts'));
    }
    
    // Store a new booking
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i', // Validate time format (HH:mm)
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'payment_id' => 'nullable|exists:payments,id',
            'discount_id' => 'nullable|exists:discounts,id',
            'total_price' => 'required|numeric|min:0',
        ]);

        // Create the new booking
        Booking::create([
            'date' => $validated['date'],
            'time' => $validated['time'],
            'status' => $validated['status'],
            'user_id' => $validated['user_id'],
            'service_id' => $validated['service_id'],
            'payment_id' => $validated['payment_id'],
            'discount_id' => $validated['discount_id'],
            'total_price' => $validated['total_price'],
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.bookings')->with('success', 'Booking created successfully!');
    }

    // Update an existing booking
    public function update(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'id' => 'required|exists:bookings,id',
            'status' => 'required|in:pending,confirmed,completed,cancelled',

        ]);

        // Find the booking and update it
        $booking = Booking::findOrFail($validated['id']);
        $booking->update([
            'status' => $validated['status'],

        ]);

        // Redirect back with a success message
        return redirect()->route('admin.bookings')->with('success', 'Booking updated successfully!');
    }

    // Delete a booking
    public function delete($id)
    {
        // Find the booking by ID and delete it
        $booking = Booking::findOrFail($id);
        $booking->delete();

        // Redirect back with a success message
        return redirect()->route('admin.bookings')->with('success', 'Booking deleted successfully!');
    }
}
