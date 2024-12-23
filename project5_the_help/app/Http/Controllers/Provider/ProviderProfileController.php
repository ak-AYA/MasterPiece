<?php

namespace App\Http\Controllers\Provider;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProviderProfileController extends Controller
{
    public function index()
    {
       
        $provider = Auth::user(); 

        $categories = Category::all(); 
        $services = Service::with('category')->get(); 
        return view('website.provider-profile', compact('provider','categories', 'services')); 
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
        dd($request);
        // Redirect with success message
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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'duration' => 'nullable|string|max:50',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'category_id' => 'exists:categories,id',
            'status' => 'required|in:1,0',
            'image' => 'nullable|string|max:255',
        ]);
        
        

        $service = Service::where('id', $serviceId) 
                          ->where('provider_id', auth()->id()) 
                          ->firstOrFail(); 

        $service->update([ 
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'duration' => $request->duration, 
            'price' => $request->price, 
        ]);

        return redirect()->route('provider.provider.profile')->with('success', 'Service updated successfully!'); 
    }
}
