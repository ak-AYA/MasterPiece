<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\PaymentIntent;
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
        $payments = Payment::where('is_active', true)->get();

        return view('website.booking', compact('user', 'service', 'payments'));
    }

    public function processBooking(Request $request)
    {
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'payment_id' => 'required|exists:payments,id',
            'service_id' => 'required|exists:services,id'
        ]);
    
        $user = Auth::user();
        $service = Service::findOrFail($request->service_id);
        
        $booking = Booking::create([
            'user_id' => $user->id,
            'service_id' => $service->id,
            'date' => $request->date,
            'time' => $request->time,
            'status' => 'pending',
            'total_price' => $service->price,
            'payment_id' => $request->payment_id,
        ]);
    
        return view('website.invoice', compact('user', 'service', 'booking')); // Directly return a view after booking
    }
    
    
    public function processStripePayment(Request $request)
    {
        $request->validate([
            'payment_method_id' => 'required|string',
            'booking_id' => 'required|exists:bookings,id',
        ]);
    
        $booking = Booking::findOrFail($request->booking_id);
    
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    
            $paymentIntent = PaymentIntent::create([
                'amount' => (int)($booking->total_price * 100),
                'currency' => 'jod',
                'payment_method' => $request->payment_method_id,
                'confirm' => true,
                'return_url' => route('user.booking.invoice', ['bookingId' => $booking->id]),
                'automatic_payment_methods' => [
                    'enabled' => true,
                    'allow_redirects' => 'never'
                ]
            ]);
    
            if ($paymentIntent->status === 'succeeded') {    
             
                return redirect()->route('user.booking.invoice', ['bookingId' => $booking->id]);
            }
    
       
            return redirect()->route('user.booking.invoice', ['bookingId' => $booking->id])
                             ->with('error', 'Payment failed');
    
        } catch (\Exception $e) {
            
            return redirect()->route('user.booking.invoice', ['bookingId' => $booking->id])
                             ->with('error', $e->getMessage());
        }
    }
    


    public function showInvoice($bookingId)
    {
        $booking = Booking::with(['user', 'service', 'payment'])->findOrFail($bookingId);

        return view('website.invoice', compact('booking'));
    }

}
