<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    // Display all payments
    public function index()
    {
        $payments = Payment::all();
        return view('admin.payments.index', compact('payments'));
    }

    // Store a new payment
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('logo_url');

        if ($request->hasFile('logo_url')) {
            $data['logo_url'] = $request->file('logo_url')->store('logos', 'public');
        }

        Payment::create($data);

        return redirect()->route('admin.payments')->with('success', 'Payment added successfully!');
    }


    public function update(Request $request)
{
    // Validate the inputs
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'logo_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'is_active' => 'required|boolean', // Validate the status field
    ]);

    // Find the payment by ID
    $payment = Payment::findOrFail($request->id);

    // Prepare the data for update
    $data = $request->only(['name', 'description', 'is_active']); // Include 'is_active'

    // Handle the logo upload
    if ($request->hasFile('logo_url')) {
        // Delete the old logo if it exists
        if ($payment->logo_url) {
            Storage::disk('public')->delete($payment->logo_url);
        }
        // Store the new logo and update the logo URL
        $data['logo_url'] = $request->file('logo_url')->store('logos', 'public');
    }

    // Update the payment record
    $payment->update($data);

    // Redirect with success message
    return redirect()->route('admin.payments')->with('success', 'Payment updated successfully!');
}

    


}
