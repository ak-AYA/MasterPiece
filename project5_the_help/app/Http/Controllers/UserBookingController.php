<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserBookingController extends Controller
{

    
    public function showBookingPage($serviceId)
    {
        $user = Auth::user();
        $service = Service::with(['category', 'provider'])->find($serviceId);
        $payments =Payment::where('is_active', true)->get();


        // dd($service);
        return view('website.booking', compact('user', 'service', 'payments'));
    }

    public function processBooking(Request $request)
    {
           
        $request->validate([
                'date' => 'required|date|after_or_equal:today',
                'time' => 'required',
                'payment_id' => 'required|exists:payments,id',
            ]);
        
            $user = Auth::user();
            $service = Service::find($request->service_id);

            // dd($service);
            $booking = Booking::create([
                'user_id' => $user->id,
                'service_id' => $service->id,
                'date' => $request->date,
                'time' => $request->time,
                'status' => 'pending',
                'total_price' => $service->price,
                'payment_id' => $request->payment_id,
            ]);
    
        return redirect()->route('user.booking.invoice', ['bookingId' => $booking->id]);
    }
    


    public function showInvoice($bookingId)
    {
        $booking = Booking::with(['user', 'service', 'payment'])->findOrFail($bookingId);
    
        return view('website.invoice', compact('booking'));
    }
    
}