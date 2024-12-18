<?php
namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category;

class ServiceController extends Controller
{
    // Display list of services
    public function index()
    {
        // Eager load the provider and category relationships with services
        $services = Service::with(['provider', 'category'])->paginate(10);  // This ensures 'provider' and 'category' data are loaded with services
        $providers = Provider::all();
        $categories = category::all();  // Corrected the variable name from $catigories to $category

        return view('admin.services.index', compact('services', 'providers', 'categories'));  // Pass category to the view
    }

    // Store a new service
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'duration' => 'required|string|max:100',
            'price' => 'required|numeric',
            'provider_id' => 'required|exists:providers,id',
            'category_id' => 'required|exists:category,id', // Added category_id validation
            'status' => 'required|boolean', // Added status validation
        ]);

        Service::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'duration' => $validated['duration'],
            'price' => $validated['price'],
            'provider_id' => $validated['provider_id'], // Ensure provider exists
            'category_id' => $validated['category_id'], // Store category_id
            'status' => $validated['status'],  // Store status
        ]);

        return redirect()->route('admin.services')->with('success', 'Service added successfully.');
    }

    // Update service details
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'description' => 'string|max:500',
            'duration' => 'string|max:100',
            'price' => 'numeric',
            'provider_id' => 'integer',
            'category_id' => 'integer',  // Ensure category_id is validated
            'status' => 'required|boolean',
        ]);

        $service = Service::findOrFail($request->id);

        // Update service details
        $service->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'duration' => $validated['duration'],
            'price' => $validated['price'],
            'provider_id' => $validated['provider_id'],
            'category_id' => $validated['category_id'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.services')->with('success', 'Service updated successfully.');
    }

    // Activate or Deactivate service
    public function toggleStatus($id)
    {
        $service = Service::findOrFail($id);
        $service->status = !$service->status;  // Toggle the status
        $service->save();

        return redirect()->route('admin.services')->with('success', 'Service status updated.');
    }
}
