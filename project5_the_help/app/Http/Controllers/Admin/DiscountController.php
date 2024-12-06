<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;
use Carbon\Carbon; // Import Carbon

class DiscountController extends Controller
{
    // Show all discounts
    public function index()
    {
        $discounts = Discount::all(); // Fetch all discounts
        
        // Format the start and end dates using Carbon before passing to the view
        foreach ($discounts as $discount) {
            $discount->date_start = Carbon::parse($discount->date_start)->toFormattedDateString();
            $discount->date_end = Carbon::parse($discount->date_end)->toFormattedDateString();
        }
        
        return view('admin.discounts.index', compact('discounts')); // Pass discounts to the view
    }

    // Store a newly created discount
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|alpha_num|min:4|max:20|unique:discounts,code',
            'amount' => 'required|numeric|min:0.01',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:0,1',
        ]);

        Discount::create([
            'code' => $request->code,
            'amount' => $request->amount,
            'date_start' => Carbon::parse($request->start_date),  // Parse start date using Carbon
            'date_end' => Carbon::parse($request->end_date),      // Parse end date using Carbon
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        return redirect()->route('admin.discounts')->with('success', 'Discount added successfully!');
    }

    // Show the form to update an existing discount
    public function edit($id)
    {
        $discount = Discount::findOrFail($id); // Find the discount by ID
        return view('admin.discounts.edit', compact('discount')); // Pass discount to the edit view
    }

    // Update an existing discount
    public function update(Request $request)
    {
        $request->validate([
            'amount' => 'numeric|required',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'code' => 'required|alpha_num|min:4|max:20', // Removed unique validation here
            'status' => 'required|in:1,0', // Ensuring that status is provided
        ]);

        // Find the discount by ID
        $discount = Discount::findOrFail($request->id);

        // Update the discount with the validated data
        $discount->update([
            'code' => $request->code,
            'amount' => $request->amount,
            'date_start' => Carbon::parse($request->start_date)->format('Y-m-d H:i:s'), // Ensure datetime format
            'date_end' => Carbon::parse($request->end_date)->format('Y-m-d H:i:s'),     // Ensure datetime format
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.discounts')->with('success', 'Discount updated successfully');
    }
}
