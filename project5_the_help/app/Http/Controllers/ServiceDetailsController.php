<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;

class ServiceDetailsController extends Controller
{
    public function show($id)
    {
        $service = Service::findOrFail($id);
        $categories = Category::all(); 
        return view('website.services-details', compact('service', 'categories'));
    }

    public function showServicesByCategory($id)
    {
        $categories = Category::all();
        $services = Service::where('category_id', $id)->get();
        $selectedCategory = Category::findOrFail($id);

        foreach ($services as $service) {
            $service->providerRating = $service->provider->reviews()->avg('stars');
        }

        return view('website.services', compact('categories', 'services', 'selectedCategory'));
    }
}
