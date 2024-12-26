<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\Provider;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with(['provider', 'category'])->get();
        $providers = Provider::all();
        $categories = Category::all();

        return view('admin.services.index', compact('services', 'providers', 'categories'));
    }

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
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $request->file('image') 
            ? $request->file('image')->storeAs('assetts/images/services', time() . '.' . $request->file('image')->getClientOriginalExtension(), 'public')
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
            'image' => 'nullable|image|max:2048',
        ]);

        $service = Service::findOrFail($request->id);

        if ($request->hasFile('image')) {
            if ($service->image) {
                $oldImagePath = public_path('assetts/images/services/' . $service->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('assetts/images/services'), $imageName);
            
            $service->image = $imageName;
        }

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
}
