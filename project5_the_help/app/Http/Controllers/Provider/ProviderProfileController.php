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
        return view('website.provider-profile', compact('provider','categories')); 
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

    public function addService(Request $request)
{
    try {
        // Validate the form request data
        $request->validate([
            'name' => 'required|string|max:20',
            'description' => 'required|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'duration' => 'required|numeric|min:0|max:12',
            'price' => 'required|numeric|min:1|max:200',
            'provider_id' => 'required|exists:users,id',
        ]);
        

        // Create a new service for the authenticated provider
        auth()->user()->services()->create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'duration' => $request->duration,
            'price' => $request->price,
        ]);

        return redirect()->route('provider.provider.profile')
                         ->with('success', 'Service added successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
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
            'name' => 'required|string|max:20',
            'description' => 'required|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'duration' => 'required|numeric|min:0|max:12', 
            'price' => 'required|numeric|min:1|max:200',
            'provider_id' => 'required|exists:users,id',
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
