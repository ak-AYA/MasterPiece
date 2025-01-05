<?php

namespace App\Http\Controllers\Provider;

use App\Models\User;
use App\Models\Review;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProviderProfileController extends Controller
{
    public function index()
    {
        $provider = Auth::user(); 
        $providerId = Auth::id();
        $categories = Category::all(); 
        $reviews = Review::where('provider_id', $providerId)->get();
        $services = Service::with('category')->where('provider_id', Auth::id())->get();  
        $bookings = Booking::whereHas('service', function ($query) {
            $query->where('provider_id', auth()->id());  
        })->get();
    
        return view('website.provider-profile', compact('provider','categories', 'services', 'reviews', 'bookings')); 
    }
    

    public function update(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to log in to update your profile.');
        }

        $validated = $request->validate([
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]{1,15}$/',
            'location' => 'required|string',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->update($validated);

        return redirect()->route('provider.provider.profile')->with('success', 'Profile updated successfully');
    }

    public function store(Request $request)
    {
        // Validate the form request data

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'duration' => 'nullable|numeric|min:1|max:24',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'category_id' => 'exists:categories,id',
            'status' => 'required|in:1,0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Handle image upload if exists
        $imagePath = $request->hasFile('image') 
            ? $request->file('image')->store('services', 'public') 
            : null;

        // Add provider_id to validated data
        $validated['provider_id'] = Auth::id();
        $validated['image'] = $imagePath;

        // Create the service
        Service::create($validated);

        return redirect()->route('provider.provider.profile')->with('success', __('Service added successfully.'));
    }

    public function editService($serviceId)
    {
        $service = Service::where('id', $serviceId) 
                          ->where('provider_id', auth()->id()) 
                          ->firstOrFail(); 

        return view('provider.provider.edit-service', compact('service')); 
    }

    public function updateService(Request $request, $serviceId)
    {
            $service = Service::find($serviceId);
        
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
        
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images/services'), $imageName);
            } else {
                $imageName = $service->image; // Keep the existing image if no new image is uploaded
            }
        
                $service->name = $request->input('name');
                $service->category_id = $request->input('category_id');
                $service->description = $request->input('description');
                $service->duration = $request->input('duration');
                $service->price = $request->input('price');
                $service->status = $request->input('status');
                $service->image = $imageName; // Save the new or existing image
                $service->save();
        
        return redirect()->route('provider.provider.profile')->with('success', __('Service updated successfully.'));
    }

    // Display the provider's services

    public function services()
    {
        $provider = Auth::user(); 
        $categories = Category::all(); 
        $services = Service::with('category')->where('provider_id', Auth::id())->get();
        return view('website.provider-profile', compact('provider', 'categories', 'services'));
    }

    public function reviews()
    {
        $reviews = Review::with(['user', 'provider'])
            ->where('is_approved', 1)
            ->get();
    
        return view('website.provider-profile', compact('reviews'));
    }
    
    
    
    public function bookings()
    {
        $bookings = Booking::with(['user', 'service', 'payment'])->get();
        return view('website.provider-profile', compact('bookings'));
    }
    
    public function updateBookingStatus(Request $request, $bookingId)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);
    
        $booking = Booking::findOrFail($bookingId);
        $currentStatus = $booking->status;
    
        $allowedTransitions = [
            'pending' => ['confirmed', 'cancelled'],
            'confirmed' => ['completed', 'cancelled'],
            'completed' => [], // لا يمكن التغيير بعد "completed"
            'cancelled' => [], // لا يمكن التغيير بعد "cancelled"
        ];
    

        if ($request->status === 'cancelled' && $currentStatus !== 'completed') {
            $booking->status = 'cancelled';
            $booking->save();
            return redirect()->back()->with('success', 'Booking status updated to Cancelled.');
        }
    

        if (!in_array($request->status, $allowedTransitions[$currentStatus])) {
            return redirect()->back()->with('error', 'Invalid status transition.');
        }
    
        $booking->status = $request->status;
        $booking->save();
    
        return redirect()->back()->with('success', 'Booking status updated successfully!');
    }
   
    
}
