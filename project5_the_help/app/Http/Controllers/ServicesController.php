<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Support\Facades\Request;

class ServicesController extends Controller
{
    public function index(Request $request)
    {

        $categories = Category::all(); 

        $selectedCategoryId = Request::query('category_id');



        if ($selectedCategoryId) {
            $services = Service::where('category_id', $selectedCategoryId)->get();
        } else {
            $services = Service::all();
        }

        foreach ($services as $service) {
            $service->providerRating = $service->provider->reviews()->avg('stars');
        }
        return view('website.services', compact('categories', 'services', 'selectedCategoryId'));


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
