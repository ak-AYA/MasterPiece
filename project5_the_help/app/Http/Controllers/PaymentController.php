<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function processStripePayment(Request $request)
    {
        $user = Auth::user();

        // Validate the request
        $request->validate([
            'payment_method_id' => 'required|string',
            'amount' => 'required|numeric|min:1',
            'booking_id' => 'required|exists:bookings,id',
        ]);

        // Set Stripe API key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Retrieve booking to confirm amount
            $booking = Booking::findOrFail($request->booking_id);

            // Create payment intent
            $paymentIntent = PaymentIntent::create([
                'amount' => $request->amount * 100, // Convert to cents
                'currency' => 'usd',
                'payment_method' => $request->payment_method_id,
                'confirmation_method' => 'manual',
                'confirm' => true,
                'return_url' => env('STRIPE_RETURN_URL'), // Use environment variable for flexibility
            ]);

            // Update booking status
            $booking->update(['status' => 'paid']);

            return response()->json([
                'success' => true,
                'paymentIntent' => $paymentIntent,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
