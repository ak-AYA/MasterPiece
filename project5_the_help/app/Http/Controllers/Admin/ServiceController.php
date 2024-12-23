<?php
namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    // Display list of services
    public function index()
    {
        $services = Service::with(['provider', 'category'])->get();
        $providers = Provider::all();
        $categories = Category::all();

        return view('admin.services.index', compact('services', 'providers', 'categories'));
    }

    // Store a new service
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'duration' => 'nullable|string|max:50',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'provider_id' => 'exists:providers,id',
            'category_id' => 'exists:categories,id',
            'status' => 'required|in:1,0',
            'image' => 'nullable|string|max:255',
        ]);


        $imagePath = $request->file('image') 
            ? $request->file('image')->store('services', 'public') 
            : null;

        Service::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'duration' => $validated['duration'],
            'price' => $validated['price'],
            'provider_id' => $validated['provider_id'],
            'category_id' => $validated['category_id'],
            'status' => $validated['status'],
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.services')->with('success', 'Service added successfully.');
    }


    public function update(Request $request)
    {

    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'duration' => 'nullable|string|max:50',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'provider_id' => 'exists:providers,id',
            'category_id' => 'exists:categories,id',
            'status' => 'required|in:1,0',
            'image' => 'nullable|string|max:255',
        ]);
    
        
        $service = Service::findOrFail($request->id);


        if ($request->hasFile('image')) {

            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }

            $service->image = $request->file('image')->store('services', 'public');
        }


        $service->update($validated);
        // dd($validated); 
        return redirect()->route('admin.services')->with('success', 'Service updated successfully.');
    }
}
