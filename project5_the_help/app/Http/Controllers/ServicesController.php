<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $categories = Category::all(); 
        $services = Service::where('category_id', $categories->first()->id ?? null)->get(); 

        foreach ($services as $service) {
            $service->providerRating = $service->provider->reviews()->avg('stars');
        }
        return view('website.services', compact('categories', 'services'));
    }

//   Service by id
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
