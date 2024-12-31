<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(Request $request)
    {
        // جلب جميع الفئات
        $categories = Category::all();
    
        // الحصول على معرّف الفئة المحددة من الاستعلام
        $selectedCategoryId = $request->query('category_id');
        
        // جلب الاستعلام للبحث (إن وجد)
        $searchQuery = $request->query('query');
    
        // إذا كان هناك فئة محددة، فلن يتم تصفية النتائج بناءً على الفئة
        if ($selectedCategoryId) {
            $services = Service::where('category_id', $selectedCategoryId);
        } else {
            $services = Service::query(); // الحصول على جميع الخدمات
        }
    
        // إذا كان هناك استعلام للبحث، فلنقوم بتصفية الخدمات بناءً عليه
        if ($searchQuery) {
            $services = $services->where('name', 'like', "%{$searchQuery}%")
                                 ->orWhere('description', 'like', "%{$searchQuery}%");
        }
    
        // تصفية النتائج حسب الفئة أو البحث
        $services = $services->paginate(9);
    
        // حساب تقييم مقدم الخدمة لكل خدمة
        foreach ($services as $service) {
            $service->providerRating = $service->provider->reviews()->avg('stars');
        }
    
        return view('website.services', compact('categories', 'services', 'selectedCategoryId', 'searchQuery'));
    }
    
    // Show services by category ID
    public function showServicesByCategory($id)
    {
        $categories = Category::all(); 
        $selectedCategory = Category::findOrFail($id); 
        $services = Service::where('category_id', $id)->paginate(9);

        // Calculate provider rating for each service
        foreach ($services as $service) {
            $service->providerRating = $service->provider->reviews()->avg('stars');
        }

        return view('website.services', compact('categories', 'services', 'selectedCategory'));
    }

    // Search services by query
    public function search(Request $request)
    {
        // Get search query input
        $searchQuery = $request->input('query');

        // If no search query, return empty result
        if (!$searchQuery) {
            return response()->json([]);
        }

        // Query services based on name or description
        $services = Service::where('name', 'LIKE', "%{$searchQuery}%")
            ->orWhere('description', 'LIKE', "%{$searchQuery}%")
            ->select('id', 'name', 'description', 'image') // Only select necessary fields
            ->get();

        // Return the matched services as JSON response
        return response()->json($services);
    }
}