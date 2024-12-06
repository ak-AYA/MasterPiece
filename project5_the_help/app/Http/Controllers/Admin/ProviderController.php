<?php

namespace App\Http\Controllers\Admin;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProviderController extends Controller
{
    // Display list of providers
    public function index()
    {
        $providers = Provider::where('role_id', 3)->paginate(10); // '3' corresponds to 'Provider'
        return view('admin.providers.index', compact('providers'));
    }

    // Update provider details
    public function update(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:providers,email,' . $request->id,
        'phone' => 'required|string|max:15',
        'location' => 'required|string|max:255',
        'status' => 'required|boolean',
    ]);

    $provider = Provider::findOrFail($request->id);
    $provider->update($validated);

    return redirect()->route('admin.providers')->with('success', 'Provider updated successfully.');
}


    // Store a new provider
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:providers,email',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8',
            'location' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);
    
        // Create the provider 
        Provider::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => bcrypt($validated['password']),
            'location' => $validated['location'],
            'status' => $validated['status'],
            'role_id' => 3,  // Static role_id for providers
        ]);
    
        return redirect()->route('admin.providers')->with('success', 'Provider added successfully.');
    }
    
}
