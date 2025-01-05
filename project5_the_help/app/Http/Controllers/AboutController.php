<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;


class aboutController extends Controller
{
    public function index()
    {
        $topReviews = Review::where('is_approved', true)  
                             ->orderBy('stars', 'desc')  
                             ->take(3)  
                             ->get();

        return view('website.about', compact( 'topReviews')); 
    }


}
