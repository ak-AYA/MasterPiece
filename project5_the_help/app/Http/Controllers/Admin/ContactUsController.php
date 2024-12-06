<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ContactUsController extends Controller
{
    // Method to display the contact us messages
    public function index()
    {
        // Get all messages from the contact_us table
        $messages = ContactUs::all();

        return view('admin.contactUs.index', compact('messages'));

    }

  // Method to update the message status (Read/Unread)
public function update(Request $request)
{
    // Validate the request to ensure 'id' and 'is_read' are present
    $request->validate([
        'id' => 'required|exists:contact_us,id',
        'is_read' => 'required|boolean', // Only true/false (1/0) allowed
    ]);

    // Find the message by ID (using the ID from the request)
    $message = ContactUs::findOrFail($request->id);

    // Update the 'is_read' status (0 for Unread, 1 for Read)
    $message->is_read = $request->is_read;
    $message->save();

    return redirect()->route('admin.contact_us')->with('success', 'Message status updated!');
}




}
