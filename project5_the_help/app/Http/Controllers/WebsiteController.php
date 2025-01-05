<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Review;


class WebsiteController extends Controller
{
    public function index(){
        $categories = Category::where('status', 1)->get();
        $topReviews = Review::where('is_approved', true)  
                             ->orderBy('stars', 'desc')  
                             ->take(3)  
                             ->get();

        return view('website.index', compact('categories', 'topReviews'));
    }
}
